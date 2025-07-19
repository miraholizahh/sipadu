<?php

namespace App\Http\Controllers\Patien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\Symptom;
use App\Models\Disease;
use App\Models\KnowledgeBase;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DiagnosisController extends Controller
{
    public function create()
    {
        $symptoms = Symptom::all();
        return view('patien.diagnosis.form', compact('symptoms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'symptoms' => 'required|array|min:1',
            'symptoms.*' => 'exists:symptoms,id',
        ]);

        $knowledgeBase = KnowledgeBase::with(['symptom', 'disease'])->get();
        $result = $this->dempsterShafer($request->symptoms, $knowledgeBase);

        if (!isset($result['idDisease'])) {
            return back()->with('error', 'Diagnosa gagal. Gejala tidak ditemukan dalam basis pengetahuan.');
        }

        $diagnosis = Diagnosis::create([
            'tanggal_diagnosa' => Carbon::now(),
            'hasil_diagnosa' => $result['penyakit'],
            'idUser' => Auth::id(),
            'idDisease' => $result['idDisease'],
        ]);

        $diagnosis->symptom()->attach($request->symptoms);

        return redirect()
            ->route('diagnosis.create')
            ->with('result', [
                'penyakit' => $result['penyakit'],
                'solusi' => $result['solusi'],
            ])
            ->with('success', 'Diagnosa berhasil disimpan.');
    }

    protected function dempsterShafer($selectedSymptoms, $knowledgeBase)
    {
        $weights = [];

        foreach ($knowledgeBase as $item) {
            if (in_array($item->idSymptom, $selectedSymptoms)) {
                $weights[$item->idDisease] = ($weights[$item->idDisease] ?? 0) + $item->bobot;
            }
        }

        if (empty($weights)) {
            return null;
        }

        arsort($weights);
        $topDiseaseId = array_key_first($weights);
        $topDisease = Disease::find($topDiseaseId);

        if (!$topDisease) {
            return null;
        }

        return [
            'idDisease' => $topDisease->id,
            'penyakit' => $topDisease->nama_penyakit,
            'solusi' => $topDisease->solusi,
        ];
    }

    public function riwayat()
    {
        $diagnosis = Diagnosis::with(['symptoms', 'disease'])
            ->where('idUser', auth()->id())
            ->latest()
            ->get();

        return view('patien.diagnosis.riwayat', compact('diagnosis'));
    }
}
