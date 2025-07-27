<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use App\Models\Disease;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $solutions = Solution::all();
        return view('staf.solution.index', compact('solutions'));
    }

    public function create()
    {
        $diseases = Disease::all();
        return view('staf.solution.create', compact('diseases'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'solusi' => 'required|max:1000',
        'idDisease' => 'required|exists:diseases,id'
    ]);

    Solution::create($validatedData);

    $notification = [
        'message' => 'Solusi berhasil ditambahkan',
        'alert-type' => 'success'
    ];

    if ($request->save == true) {
        return redirect()->route('solution.index')->with($notification);
    } else {
        return redirect()->route('solution.store')->with($notification);
    }
}

    public function edit($id)
    {
        $solution = Solution::findOrFail($id);
        $diseases = Disease::all();

        return view('staf.solution.edit', compact('solution', 'diseases'));
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'solusi' => 'required|max:1000',
        ]);
    
        Solution::where('id', $id)->update($validatedData);
        $notification = array(
            'message' => 'Solusi berhasil diperbaharui',
            'alert-type' => 'success'
        );
        return redirect()->route('solution.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $solution = Solution::findOrFail($id);
        $solution->delete();
        $notification = array(
            'message' => 'Solusi berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('solution.index')->with($notification);
    }

}

