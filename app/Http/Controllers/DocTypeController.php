<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use Illuminate\Http\Request;

class DocTypeController extends Controller
{
    public function index()
    {
        $docType = DocType::all();
        
        return view('admin.docType.index', ['docType' => $docType]);
    }

    public function create()
    {
        return view('admin.docType.form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'idDoc' => 'required|string|max:10|unique:DocType,idDoc',
            'dType' => 'required|string|max:50',
        ]);

        DocType::create([
            'idDoc' => $request->idDoc,
            'dType' => $request->dType,
        ]);
        return redirect()->route('docType.index')->with('success', 'Document Type added successfully.');

    }

    public function edit($idDoc)
    {
        $docType = DocType::findOrFail($idDoc);
        return view('admin.docType.form', ['docType' => $docType]);
    }

    public function update(Request $request, $idDoc)
    {
        $request->validate([
            'dType' => 'required|string|max:50',
        ]);

        $docType = DocType::findOrFail($idDoc);
        $docType->update([
            'dType' => $request->dType,
        ]);

        return redirect()->route('docType.index')->with('success', 'Document Type updated successfully.');
    }

    public function delete($idDoc)
    {
        DocType::findOrFail($idDoc)->delete();
        

        return redirect()->route('docType.index')->with('success', 'Document Type deleted successfully.');
    }
}
