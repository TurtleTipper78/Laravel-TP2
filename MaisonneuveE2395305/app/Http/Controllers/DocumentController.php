<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::paginate(10); 
        // $documents = Document::all(); 
        return view('document.index', ['document' => $documents]);
    }

    public function create()
    {
        return view('document.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $document = $request->file('file');
        $docuName = time() . '_' . $document->getClientOriginalName();
        $docuPath = $document->move(public_path('img'), $docuName);

        $documentModel = new Document();
        $documentModel->title = $request->title;
        $documentModel->docu_path = 'img/' . $docuName; 
        $documentModel->user_id = auth()->user()->id;
        $documentModel->save();

        return redirect()->route('document.index')->with('success', 'Document uploaded successfully.');
    }


    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('document.edit', compact('document'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ]);

    $document = Document::findOrFail($id);

    $document->title = $request->title;

    if ($request->hasFile('file')) {
        $newDocument = $request->file('file');
        $docuName = time() . '_' . $newDocument->getClientOriginalName();
        $docuPath = $newDocument->move(public_path('img'), $docuName);
        Storage::delete($document->docu_path);
        $document->docu_path = 'img/' . $docuName;
    }

    $document->save();

    return redirect()->route('document.index')->with('success', 'Document updated successfully.');
}



    public function delete($id)
    {
        $document = Document::findOrFail($id);
        Storage::delete($document->docu_path); 
        $document->delete();

        return redirect()->route('document.index')->with('success', 'Document deleted successfully.');
    }

}
