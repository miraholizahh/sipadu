<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DempsterShafer;
use App\Models\Symptom;
use App\Models\KnowledgeBase;
use App\Models\Disease;
use App\Models\Diagnosis;

class DempsterShaferController extends Controller
{
    public static function store(array $inputGejala)
    {
        // Validasi minimal 3 gejala
        if (count($inputGejala) < 3) {
            return [
                'status' => 'error',
                'message' => 'Minimal harus memilih 3 gejala',
                'data' => null
            ];
        }

        $bpas = KnowledgeBase::with(['symptom', 'disease'])
            ->whereIn('idSymptom', array_keys($inputGejala))
            ->get();

        if ($bpas->isEmpty()) {
            return [
                'status' => 'error',
                'message' => 'Tidak ada data gejala yang cocok',
                'data' => null
            ];
        }

        $combinedBPA = [];

        // Group berdasarkan gejala
        $grouped = $bpas->groupBy('idSymptom');

        foreach ($grouped as $symptomId => $items) {
            if (!isset($inputGejala[$symptomId])) {
                continue;
            }

            $belief = max(0, min(1, $inputGejala[$symptomId]));

            // Ambil semua penyakit unik dari gejala ini
            $diseases = $items->pluck('idDisease')->unique()->sort()->values();
            $keyDiseases = $diseases->implode(',');

            // BPA satu gejala
            $m2 = [
                $keyDiseases => $belief,
                'Θ' => 1 - $belief,
            ];

            if (empty($combinedBPA)) {
                $combinedBPA = $m2;
                continue;
            }

            $newBPA = [];
            $conflict = 0;

            foreach ($combinedBPA as $A => $m1_val) {
                foreach ($m2 as $B => $m2_val) {
                    $aSet = ($A === 'Θ') ? ['Θ'] : explode(',', $A);
                    $bSet = ($B === 'Θ') ? ['Θ'] : explode(',', $B);

                    // Hitung irisan
                    if ($A === 'Θ') {
                        $intersection = $bSet;
                    } elseif ($B === 'Θ') {
                        $intersection = $aSet;
                    } else {
                        $intersection = array_intersect($aSet, $bSet);
                    }

                    if (empty($intersection)) {
                        $conflict += $m1_val * $m2_val;
                    } else {
                        $intersection = array_unique($intersection);
                        sort($intersection);
                        $key = implode(',', $intersection);

                        if (!isset($newBPA[$key])) {
                            $newBPA[$key] = 0;
                        }

                        $newBPA[$key] += $m1_val * $m2_val;
                    }
                }
            }

            if ($conflict < 1) {
                foreach ($newBPA as $key => $val) {
                    $newBPA[$key] = $val / (1 - $conflict); // Normalisasi
                }
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Konflik total saat menggabungkan gejala ' . $symptomId,
                    'data' => null
                ];
            }

            $combinedBPA = $newBPA;
        }

        if (empty($combinedBPA)) {
            return [
                'status' => 'error',
                'message' => 'Tidak ada hasil perhitungan yang valid',
                'data' => null
            ];
        }

        arsort($combinedBPA);

        // Ambil key tertinggi yang bukan Θ
        $topKey = 'Θ';
        $beliefFinal = 0;
        foreach ($combinedBPA as $key => $value) {
            if ($key !== 'Θ') {
                $topKey = $key;
                $beliefFinal = $value;
                break;
            }
        }

        $plausibilityFinal = 1 - ($combinedBPA['Θ'] ?? 0);

        if ($topKey === 'Θ') {
            return [
                'status' => 'error',
                'message' => 'Tidak dapat menentukan penyakit',
                'data' => null
            ];
        }

        return [
            'status' => 'success',
            'message' => 'Perhitungan berhasil',
            'data' => [
                'idDisease' => $topKey,
                'belief' => $beliefFinal,
                'plausibility' => $plausibilityFinal,
            ]
        ];
    }
}

