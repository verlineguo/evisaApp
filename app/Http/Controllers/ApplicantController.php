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


    public function detail($idApplicant)
    {
        $applicant = Applicant::find($idApplicant);
        if (!$applicant) {
            return redirect()->route('admin.applicant.index')->with('error', 'Applicant not found.');
        }
        return view('admin.applicant.detail', compact('applicant'));
    }




}
