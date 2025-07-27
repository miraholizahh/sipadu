<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Models\Disease;
use App\Models\Solution;
use App\Models\Roles;
use Illuminate\Http\Request;

class DiseaseController extends Controller
{
    public function index()
    {
        $disease['diseases'] = Disease::all(); 
        return view('staf.disease.index', $disease);
    }


    public function create()
    {
        $solutions = Solution::all();
        return view('staf.disease.create', compact('solutions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_penyakit' => 'required|string|max:10|unique:diseases,kode_penyakit',
            'nama_penyakit' => 'required|string|max:255',
            'keterangan' => 'required|string|max:1000',
        ], [
            'kode_penyakit.unique' => 'Kode penyakit sudah ada, silakan gunakan kode lain.',
        ]);

        Disease::create($validatedData);

        $notification = [
            'message' => 'Data penyakit berhasil ditambahkan',
            'alert-type' => 'success'
        ];

        if ($request->save == true) {
            return redirect()->route('disease.index')->with($notification);
        } else {
            return redirect()->route('disease.store')->with($notification);
        }
    }   


    public function edit($id)
    {
        $disease = Disease::findOrFail($id);
        return view('staf.disease.edit', compact('disease'));
        
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_penyakit' => 'required|string|max:10',
            'nama_penyakit' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);
    
        Disease::where('id', $id)->update($validatedData);
        $notification = array(
            'message' => 'Data penyakit berhasil diperbaharui',
            'alert-type' => 'success'
        );
        return redirect()->route('disease.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $disease = Disease::findOrFail($id);
        $disease->delete();
        $notification = array(
            'message' => 'Data penyakit berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('disease.index')->with($notification);
    }

}
