<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DempsterShafer;
use App\Models\Symptom;
use App\Models\KnowledgeBase;
use App\Models\Disease;

class DempsterShaferController extends Controller
{
    public function index()
    {
        $data['dempster_shafers'] = DempsterShafer::all();
        return view('staf.dempstershafer.index', $data);
    }

    public function create()
    {
        $symptom = Symptom::all();
        return view('staf.dempstershafer.create', compact('symptom'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'gejala' => 'required|array|min:1',
        ]);

        $inputGejala = $validatedData['gejala'];

        $bpas = KnowledgeBase::with(['symptom', 'disease'])
            ->whereIn('idSymptom', array_keys($inputGejala))
            ->get();

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
        $mostProbable = array_key_first($combinedBPA);
        $beliefFinal = $combinedBPA[$mostProbable];
        $plausibilityFinal = 1 - ($combinedBPA['Θ'] ?? 0);

        DempsterShafer::create([
            'belief' => $beliefFinal,
            'plausibility' => $plausibilityFinal,
            'idBasisPengetahuan' => $bpas->first()->id
        ]);

        return redirect()->route('dempstershafer.index')->with([
            'message' => 'Perhitungan Dempster-Shafer berhasil disimpan',
            'alert-type' => 'success'
        ]);
    }
}
