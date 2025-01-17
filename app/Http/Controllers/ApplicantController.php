<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class ApplicantController extends Controller
{
    public function index() 
{
        $user = Auth::guard('employee')->user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        if ($user->role == 1) { 
            $applicant = Applicant::all()->toArray();
            return view('admin.applicant.index', ['applicant' => $applicant]);
        } elseif ($user->role == 2) { 
            $applicant = Applicant::all()->toArray();
            return view('consultant.applicant.index', ['applicant' => $applicant]);
        } else {
            return redirect()->route('home')->with('error', 'Unauthorized access');
        }
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

    
    // function untuk applicant
    public function home()
    {
        return view('applicant.home');
    }

    public function uploadDP()
    {
        return view('applicant.upload-data-pribadi');
    }

    public function uploadKV()
    {
        return view('applicant.upload-keterangan-visa');
    }

    public function uploadDoc()
    {
        return view('applicant.upload-dokumen');
    }
    
    public function done()
    {
        return view('applicant.upload-done');
    }

    public function statusPengajuan()
    {
        return view('applicant.status-pengajuan');
    }

    public function pembayaranVisa()
    {
        return view('applicant.pembayaran-visa');
    }

    public function storeApplicant(Request $request)
    {
        dd($request->all());
        $request->validate([
            'idApplicant' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'motherName' => 'required',
            'phoneNo' => 'required',
            'emailAddress' => 'required',
            'profession' => 'required',
            'address' => 'required',
        ]);

        $applicant = new Applicant();

        $applicant->idApplicant = $request->idApplicant;
        $applicant->name = $request->name;
        $applicant->gender = $request->gender;
        $applicant->dob = $request->dob;
        $applicant->motherName = $request->motherName;
        $applicant->phoneNo = $request->phoneNo;
        $applicant->emailAddress = $request->emailAddress;
        $applicant->profession = $request->profession;
        $applicant->address = $request->address;
        $applicant->save();

        return redirect()->route('applicant.uploadDP')->with('success', 'Data pemohon berhasil disimpan!');
    }
}
