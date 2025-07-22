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
    public function index()
    {
        $data['dempster_shafers'] = DempsterShafer::with('knowledge_bases')->get();
        return view('staf.dempstershafer.index', $data);
    }

    public function create()
    {
        $symptom = Symptom::all();
        return view('staf.dempstershafer.create', compact('symptom'));
    }

    // ⬇️ Method ini menggantikan fungsi `hitung()` sebelumnya
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
            $belief = $inputGejala[$bpa->idSymptom];

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
                        $intersection = ($A == $B) ? $A : (($A == 'Θ' || $B == 'Θ') ? ($A == 'Θ' ? $B : $A) : null);

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

                foreach ($newBPA as $key => $value) {
                    $newBPA[$key] = $value / (1 - $conflict);
                }

                $combinedBPA = $newBPA;
            }
        }

        arsort($combinedBPA);
        $topKey = array_key_first($combinedBPA);
        $beliefFinal = $combinedBPA[$topKey];
        $plausibilityFinal = 1 - ($combinedBPA['Θ'] ?? 0);

        if ($topKey === 'Θ') return null;

        return [
            'idDisease' => $topKey,
            'belief' => $beliefFinal,
            'plausibility' => $plausibilityFinal,
        ];
}

}
