<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\User;
use App\Models\Disease;
use App\Models\Symptom;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function diagnosa(Request $request)
    {
        $query = Diagnosis::with(['user', 'disease.solutions', 'symptom']);

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('tanggal_diagnosa', [$request->from, $request->to]);
        }

        $diagnosis = $query->orderBy('tanggal_diagnosa', 'asc')->get();

        return view('staf.laporan.diagnosa', compact('diagnosis'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $diagnosis = Diagnosis::with(['user', 'disease.solutions', 'symptom'])
                    ->where('tanggal_diagnosa', 'like', '%' . $search . '%')
                    ->get();

        return view('staf.laporan.diagnosa', compact('diagnosis'));
    }

    public function print(Request $request)
    {
        $query = Diagnosis::with(['user', 'disease.solutions', 'symptom']);

        if ($request->filled('from') && $request->filled('to')) {
            $query->whereBetween('tanggal_diagnosa', [$request->from, $request->to]);
        }

        $diagnosis = $query->orderBy('tanggal_diagnosa', 'asc')->get();

        $pdf = Pdf::loadView('staf.laporan.print', ['diagnosis' => $diagnosis]);
        return $pdf->download('laporan_diagnosa.pdf');
    }

}
