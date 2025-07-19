<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use App\Models\Symptom;
use App\Models\Roles;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index()
    {
        $symptom['symptoms'] = Symptom::all();
        return view('staf.symptom.index', $symptom);
    }

    public function create()
    {
        return view('staf.symptom.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'kode_gejala' => 'required|string|max:10',
        'nama_gejala' => 'required|string|max:255',
    ]);

    Symptom::create($validatedData);
    $notification = array(
        'message' => 'Data gejala berhasil ditambahkan',
        'alert-type' => 'success'
    );
    if($request->save == true) {
        return redirect()->route('symptom.index')->with($notification);
    } else {
        return redirect()->route('symptom.store')->with($notification);
    }
}

    public function edit($id)
    {
        $symptom = Symptom::findOrFail($id);
        return view('staf.symptom.edit', compact('symptom'));
        
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_gejala' => 'required|string|max:10',
            'nama_gejala' => 'required|string|max:255',
        ]);
    
        Symptom::where('id', $id)->update($validatedData);
        $notification = array(
            'message' => 'Data gejala berhasil diperbaharui',
            'alert-type' => 'success'
        );
        return redirect()->route('symptom.index')->with($notification);
    }

    public function destroy(string $id)
    {
        $symptom = Symptom::findOrFail($id);
        $symptom->delete();
        $notification = array(
            'message' => 'Data gejala berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('symptom.index')->with($notification);
    }

}
