<?php

namespace App\Http\Controllers;

use App\Models\VisaApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visa;
use App\Models\Applicant;
use Illuminate\Support\Facades\Log;
use App\Models\MainDocument;
use App\Models\ApplicationProcess;
class VisaApplicantController extends Controller
{
    public function index()
    {
        $visaApplicant = VisaApplicant::with(['applicant', 'visa'])->get()->toArray();
        return view('admin.visaApplicant.index', ['visaApplicant' => $visaApplicant]);
    }
    public function create()
    {
        $applicant = Applicant::all();
        $visa = Visa::all();
        
        return view('admin.visaApplicant.form', ['applicant' => $applicant, 'visa' => $visa]);
    }

    public function save(Request $request)
    {
    
        DB::statement('EXEC SP_createVisaApplicant ?, ?, ?, ?, ?, ?, ?', [
            $request->idApplicant,
            $request->idFee,
            $request->dateOfArrival,
            $request->dateOfDeparture,
            $request->lengthOfStay,
            $request->prevCountry,
            $request->expDate,
        ]);
        Log::info('Data berhasil disimpan.');
    
        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application added successfully.');
    }

    public function edit($idVisa)
    {
        $visaApplicant = VisaApplicant::with(['applicant', 'visa'])->find($idVisa);
        $applicant = Applicant::all();
        $visa = Visa::all();
        return view('admin.visaApplicant.form', [
            'visaApplicant' => $visaApplicant,
            'applicant' => $applicant,
            'visa' => $visa,
        ]);
    }

    public function update(Request $request, $idVisa)
    {
        DB::statement('EXEC SP_updateVisaApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $idVisa,
            $request->idApplicant,
            $request->jenisVisa,
            $request->countryOfDest,
            $request->dateOfArrival,
            $request->dateOfDeparture,
            $request->lengthOfStay,
            $request->prevCountry,
            $request->expDate,
        ]);

        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application updated successfully.');
    }

    public function delete($idVisa)
    {
        DB::statement('EXEC SP_DeleteVisaApplicant ?', [$idVisa]);
        return redirect()->route('admin.visaApplicant.index')->with('success', 'Visa application deleted successfully.');
    }

    public function detail($idVisa)
    {
        $visaApplicant = DB::table('viewVisaDetail')->where('VisaID', $idVisa)->first();
        if (!$visaApplicant) {
            return redirect()->route('admin.visaApplicant.index')->with('error', 'visa not found.');
        }
        return view('admin.visaApplicant.detail', compact('visaApplicant'));
    }

    // public function viewDocuments($idVisa)
    // {
    //     $visaApplicant = VisaApplicant::find($idVisa);
    //     $documents = MainDocument::where('idVisa', $idVisa)->get();

    //     return view('admin.visaApplicant.documents', compact('visaApplicant', 'documents'));
    // }
    // public function showApplicationProcess($idVisa)
    // {
    //     $applicationProcesses = ApplicationProcess::where('idVisa', $idVisa)->get();

    //     return view('admin.visaApplicant.applicationProcess', compact('application Processes'));
    // }

    

}