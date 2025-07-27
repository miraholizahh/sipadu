<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Symptom;
use App\Models\Disease;
use App\Models\KnowledgeBase;
use App\Models\Diagnosis;
use App\Models\Solution;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $symptom_count = Symptom::count();
        $disease_count = Disease::count();
        $knowledge_base_count = KnowledgeBase::count();
        $solution_count = Solution::count();
        $laporan_count = Diagnosis::count();
        $user_count = User::where('nama', '!=', 'admin')->count();
    
        return view('dashboard', compact('symptom_count', 'disease_count', 'knowledge_base_count', 'solution_count', 'laporan_count', 'user_count'));
    }

}
