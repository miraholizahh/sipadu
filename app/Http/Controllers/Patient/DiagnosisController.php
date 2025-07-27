<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Staf\DempsterShaferController; 
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\Symptom;
use App\Models\Disease;
use App\Models\KnowledgeBase;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class DiagnosisController extends Controller
{
    public function create()
    {
        $symptoms = Symptom::all();
        return view('patient.diagnosis.form', compact('symptoms'));
    }

    public function store(Request $request)
{
    $request->validate([
        'symptoms' => 'required|array|min:1',
        'symptoms.*' => 'exists:symptoms,id',
    ]);

    // Siapkan array [idSymptom => bobot]
    $knowledgeBase = KnowledgeBase::whereIn('idSymptom', $request->symptoms)->get();

    if ($knowledgeBase->isEmpty()) {
        return back()->with('error', 'Gejala tidak ditemukan dalam basis pengetahuan.');
    }

    $inputGejala = [];
    foreach ($knowledgeBase as $item) {
        $inputGejala[$item->idSymptom] = $item->bobot;
    }

    $result = DempsterShaferController::store($inputGejala);

    if (!$result || !isset($result['idDisease'])) {
        return back()->with('error', 'Diagnosa gagal.');
    }

    // Simpan hasil ke tabel diagnosis
    $diagnosis = Diagnosis::create([
        'tanggal_diagnosa' => Carbon::now(),
        'hasil_diagnosa' => round($result['belief'] * 100, 2),
        'idUser' => Auth::id(),
        'idDisease' => $result['idDisease'],
    ]);

    $diagnosis->symptom()->attach($request->symptoms);

    return redirect()
        ->route('diagnosis.result', $diagnosis->id)
        ->with('success', 'Diagnosa berhasil disimpan.');
}

    public function show($id)
    {
        $diagnosis = Diagnosis::with(['user', 'symptom', 'disease'])->findOrFail($id);
        return view('patient.diagnosis.result', compact('diagnosis'));
    }

    public function riwayat()
    {
        $user = Auth::user();

        $diagnosis = Diagnosis::with(['disease', 'symptom', 'user'])
                        ->where('idUser', $user->id)
                        ->orderBy('created_at', 'asc')
                        ->get();

        return view('patient.diagnosis.riwayat', compact('diagnosis'));
    }

    public function print($id)
    {
        $diagnosis = Diagnosis::with(['user', 'symptom', 'disease.solutions'])->findOrFail($id);

        $pdf = Pdf::loadView('patient.diagnosis.print', compact('diagnosis'))->setPaper('a4', 'portrait');
        return $pdf->stream('diagnosa_' . $diagnosis->user->nama . '.pdf');
    }

}
