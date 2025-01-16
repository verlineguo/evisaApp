<?php

namespace App\Http\Controllers;

use App\Models\DocType;
use App\Models\MainDocument;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class MainDocumentController extends Controller
{

    public function index()
    {
        $document = MainDocument::with('docType')->get()->toArray();
        return view('admin.document.index', ['document' => $document]);
    }
    public function save(Request $request)
    {
        $formattedDate = Carbon::createFromFormat('Y-m-d\TH:i', $request->uploadedDate)->format('Y-m-d H:i:s');
        DB::statement('EXEC SP_createDocument ?, ?, ?, ?', [
            $request->idApplicant,
            $request->documentType,
            $request->filePath,
            $formattedDate
        ]);

        return redirect()->route('admin.document.index')->with('success', 'Document added successfully.');

    }
    public function create()
    {
        $docType = DocType::all(); 
        
        return view('admin.document.form', ['docType' => $docType]);
    }

    public function edit($documentNo)
    {
        $docType = DocType::all();
        $document = MainDocument::findOrFail($documentNo);
        return view('admin.document.form', compact('document', 'docType'));
    }

    public function update(Request $request, $documentNo)
    {
        DB::statement('EXEC SP_updateDocument ?, ?, ?, ?, ?', [
            $documentNo,
            $request->idApplicant,
            $request->documentType,
            $request->filePath,
            $request->uploadedDate,
        ]);

        return redirect()->route('admin.document.index')->with('success', 'Document updated successfully.');
    }

    public function delete($documentNo)
    {
        DB::statement('EXEC SP_deleteDocument ?', [$documentNo]);

        return redirect()->route('admin.document.index')->with('success', 'Document deleted successfully.');
    }

}
