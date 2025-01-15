<?php

namespace App\Http\Controllers;

use App\Models\VisaApplicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Visa;
use App\Models\Applicant;

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
        DB::statement('EXEC SP_createVisaApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $request->idVisa,
            $request->idApplicant,
            $request->jenisVisa,
            $request->countryOfDest,
            $request->dateOfArrival,
            $request->dateOfDeparture,
            $request->lengthOfStay,
            $request->prevCountry,
            $request->expDate,
        ]);
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

}