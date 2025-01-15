<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApplicantController extends Controller
{
    public function index() 
    {
        $applicant = Applicant::all()->toArray();; 
        return view('admin.applicant.index', ['applicant' => $applicant]);
    }

    public function create()
    {
        return view('admin.applicant.form');
    }

    // Menyimpan applicant baru ke database
    public function save(Request $request)
    {

        DB::statement('EXEC SP_createApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $request->name,
            $request->username,
            bcrypt($request->password),
            $request->dob,
            $request->phoneNo,
            $request->emailAddress,
            $request->address,
            $request->motherName,
            $request->gender,
            $request->profession,
        ]);

        return redirect()->route('applicant.index')->with('success', 'Applicant added successfully.');

    }

    public function edit($idApplicant)
    {
        $applicant = Applicant::find($idApplicant);  
        return view('admin.applicant.form', ['applicant' => $applicant]);
    }

    public function update(Request $request, $idApplicant)
    {
        DB::statement('EXEC SP_updateApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $idApplicant,
            $request->name,
            $request->username,
            $request->password ? bcrypt($request->password) : null,
            $request->dob,
            $request->phoneNo,
            $request->emailAddress,
            $request->address,
            $request->motherName,
            $request->gender,
            $request->profession,
        ]);
        return redirect()->route('admin.applicant.index')->with('success', 'Applicant updated successfully.');
    }

    public function delete($idApplicant)
    {
        DB::statement('EXEC SP_deleteApplicant ?', [$idApplicant]);

        return redirect()->route('admin.applicant.index')->with('success', 'Applicant deleted successfully.');
    }

    public function detail($idApplicant)
    {
        $applicant = Applicant::find($idApplicant);
        if (!$applicant) {
            return redirect()->route('admin.applicant.index')->with('error', 'Applicant not found.');
        }
        return view('admin.applicant.detail', compact('applicant'));
    }




}
