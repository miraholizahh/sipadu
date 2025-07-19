<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user_count = User::where('nama', '!=', 'admin')->count();
    
        return view('dashboard', compact('user_count'));
    }
}
