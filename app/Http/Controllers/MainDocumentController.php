<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainDocumentController extends Controller
{
    protected $table = 'ViewApplicantDocuments';
    public $timestamps = false;
    protected $fillable = ['documentNo', 'filePath', 'uploadedDate', 'documentType', 'applicantName'];

}
