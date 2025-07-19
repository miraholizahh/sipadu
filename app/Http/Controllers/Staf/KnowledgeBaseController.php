<?php

namespace App\Http\Controllers\Staf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KnowledgeBase;
use App\Models\Symptom;
use App\Models\Disease;

class KnowledgeBaseController extends Controller
{
    public function index()
    {
        $knowledge_bases['knowledge_bases'] = KnowledgeBase::with(['symptom', 'disease'])->get();
        return view('staf.knowledgebase.index', $knowledge_bases);
    }

    public function create()
    {
        $symptoms = Symptom::all();
        $diseases = Disease::all();
        return view('staf.knowledgebase.create', compact('symptoms', 'diseases'));
    }

    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'idSymptom'           => 'required|exists:symptoms,id',
        'idDisease'           => 'required|exists:diseases,id',
        'bobot'               => 'required|numeric|min:0|max:1',
    ]);

    KnowledgeBase::create($validatedData);

    $notification = [
        'message'     => 'Data basis pengetahuan berhasil ditambahkan',
        'alert-type'  => 'success',
    ];

    if ($request->save == true) {
        return redirect()->route('knowledge_base.index')->with($notification);
    } else {
        return redirect()->route('knowledge_base.create')->with($notification);
    }
    }

    public function edit($id)
    {
        $knowledge_base = KnowledgeBase::findOrFail($id);
        $symptoms = Symptom::all();
        $diseases = Disease::all();

        return view('staf.knowledgebase.edit', compact('knowledge_base', 'symptoms', 'diseases'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'idSymptom' => 'required|exists:symptoms,id',
            'idDisease' => 'required|exists:diseases,id',
            'bobot'     => 'required|numeric|min:0|max:1',
        ]);

        KnowledgeBase::where('id', $id)->update($validatedData);

        $notification = [
            'message' => 'Data basis pengetahuan berhasil diperbaharui',
            'alert-type' => 'success'
        ];

        return redirect()->route('knowledge_base.index')->with($notification);
    }

    public function destroy($id)
    {
        $knowledge_base = KnowledgeBase::findOrFail($id);
        $knowledge_base->delete();

        $notification = array(
            'message' => 'Data basis pengetahuan berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('knowledge_base.index')->with($notification);
    }
}
