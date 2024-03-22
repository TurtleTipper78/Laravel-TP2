<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;


class DocumentController extends Controller
{
    public function index()
    {
        // $documents = Document::paginate(10); 
        $documents = Document::all(); 
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
        $docuPath = $document->storeAs('uploads', $docuName);

        $document = new Document();
        $document->title = $request->title;
        $document->docu_path = $docuPath;
        $document->user_id = auth()->user()->id;
        $document->save();

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
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $document = $request->file('file');
        $docuName = time() . '_' . $document->getClientOriginalName();
        $docuPath = $document->storeAs('uploads', $docuName);

        $document = new Document();
        $document->title = $request->title;
        $document->docu_path = $docuPath;
        $document->user_id = auth()->user()->id;
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
