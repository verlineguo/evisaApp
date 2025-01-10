<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;


Route::get("/dashboard", function () {
    return view('consultant.dashboard');
});

Route::controller(ApplicantController::class)->prefix('applicant')->group(function () {
    Route::get('', 'index')->name('applicant');

});