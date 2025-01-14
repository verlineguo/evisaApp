<?php

namespace App\Http\Controllers;

use App\Models\VisaApplicant;
use Illuminate\Http\Request;

class VisaApplicantController extends Controller
{
    /*
    public function viewVisaApplicationDetails($idVisa)
    {
        $application = VisaApplicant::with(['applicant', 'visaFee', 'documents'])->find($idVisa);
        return view('consultant.viewVisaApplicationDetails', compact('application'));
    }

    public function acceptVisa($idVisa)
{
    $application = VisaApplicant::find($idVisa);
    
    $application->status = 'Accepted'; 
    $application->save();

    ApplicationProcess::create([
        'idEmp' => auth()->user()->idEmp, 
        'idVisa' => $idVisa,
        'startDate' => now(),
        'endDate' => now(),
        'idStat' => 'Accepted', 
    ]);

    return redirect()->route('consultant.visaApplications')->with('success', 'Visa Accepted');
}
public function rejectVisa($idVisa)
{
    $application = VisaApplicant::find($idVisa);
    
    $application->status = 'Rejected'; 
    $application->save();

    ApplicationProcess::create([
        'idEmp' => auth()->user()->idEmp, 
        'idVisa' => $idVisa,
        'startDate' => now(),
        'endDate' => now(),
        'idStat' => 'Rejected', 
    ]);

    return redirect()->route('consultant.visaApplications')->with('error', 'Visa Rejected');
}*/

}