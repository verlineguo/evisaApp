<?php

namespace App\Http\Controllers;

use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index() 
    {
        $data = Applicant::all();
        return view('consultant.applicant.index', compact('data'));
    }

}
