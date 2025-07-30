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
        $bpas = KnowledgeBase::with(['symptom', 'disease'])
            ->whereIn('idSymptom', array_keys($inputGejala))
            ->get();

        if ($bpas->isEmpty()) {
            return null;
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
                    'message' => 'Konflik total saat menggabungkan gejala ' . $symptomId,
                    'combinedBPA' => [],
                ];
            }

            $combinedBPA = $newBPA;
        }

        if (empty($combinedBPA)) {
            return null;
        }

        arsort($combinedBPA);

        // Ambil key tertinggi yang bukan Θ
        foreach ($combinedBPA as $key => $value) {
            if ($key !== 'Θ') {
                $topKey = $key;
                $beliefFinal = $value;
                break;
            }
        }

        $beliefFinal = $combinedBPA[$topKey] ?? 0;
        $plausibilityFinal = 1 - ($combinedBPA['Θ'] ?? 0);

        if ($topKey === 'Θ') {
            return null;
        }

        return [
            'idDisease' => $topKey,
            'belief' => $beliefFinal,
            'plausibility' => $plausibilityFinal,
        ];
    }
}

