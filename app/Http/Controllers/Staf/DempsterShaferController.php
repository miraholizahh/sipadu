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

        foreach ($bpas as $index => $bpa) {
            $disease = $bpa->disease->id;

            // Validasi nilai belief agar tetap dalam rentang [0, 1]
            $belief = max(0, min(1, $inputGejala[$bpa->idSymptom]));

            $m = [
                $disease => $belief,
                'Θ' => 1 - $belief
            ];

            if ($index === 0) {
                $combinedBPA = $m;
            } else {
                $newBPA = [];
                $conflict = 0;

                foreach ($combinedBPA as $A => $m1) {
                    foreach ($m as $B => $m2) {
                        $intersection = ($A == $B)
                            ? $A
                            : (($A == 'Θ' || $B == 'Θ') ? ($A == 'Θ' ? $B : $A) : null);

                        if ($intersection) {
                            if (!isset($newBPA[$intersection])) {
                                $newBPA[$intersection] = 0;
                            }
                            $newBPA[$intersection] += $m1 * $m2;
                        } else {
                            $conflict += $m1 * $m2;
                        }
                    }
                }

                // Jika terjadi konflik total, hentikan kombinasi, gunakan BPA terakhir
                if ($conflict >= 1) {
                    // Bisa juga log/beri peringatan jika diperlukan
                    break; // hentikan penggabungan lebih lanjut
                }

                // Normalisasi dengan membagi total keyakinan dengan (1 - conflict)
                foreach ($newBPA as $key => $value) {
                    $newBPA[$key] = $value / (1 - $conflict);
                }

                $combinedBPA = $newBPA;
            }
        }

        if (empty($combinedBPA)) {
            return null;
        }

        arsort($combinedBPA);

        $topKey = array_key_first($combinedBPA);
        $beliefFinal = $combinedBPA[$topKey];
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
