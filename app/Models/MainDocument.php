<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainDocument extends Model
{
    public function index()
    {
        $documents = MainDocument::all();
        return view('applicant_documents.index', compact('documents'));
    }
}
