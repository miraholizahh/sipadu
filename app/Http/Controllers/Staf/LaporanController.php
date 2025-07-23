<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\User;
use App\Models\Disease;
use App\Models\Symptom;

class LaporanController extends Controller
{
    public function riwayatDiagnosa()
    {
        // Ambil data diagnosis beserta relasinya
        $diagnosis = Diagnosis::with(['user', 'disease', 'symptom'])->get();

        return view('staf.laporan.diagnosa', compact('diagnosis'));
    }
}
