<?php

use App\Http\Controllers\ApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaApplicantController;
use App\Http\Controllers\Auth\EmployeeLoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;

// Rute untuk consultant dashboard
Route::get('/consultant/dashboard', function () {
    return view('consultant.dashboard');
})->name('consultant.dashboard');

// Rute untuk admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

// Rute untuk employee dashboard (bisa untuk role employee lainnya)
Route::get('/employee/dashboard', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');

Route::controller(ApplicantController::class)->prefix('consultant/applicant')->group(function () {
    Route::get('', action: 'index')->name('applicant');
    /*Route::get('edit/{id}', 'edit')->name('applicant.edit');
    Route::get('remove/{id}', 'remove')->name('applicant.remove');
    Route::get('add', 'add')->name('applicant.add');
    Route::get('add', 'save')->name( 'applicant.add.save');
    Route::get('edit/{id}', 'update')->name('applicant.add.update');
    */
});

Route::controller( RoleController::class)->prefix('admin/role')->group(function () {
    Route::get('', action: 'index')->name('admin.role');
    /*Route::get('edit/{id}', 'edit')->name('applicant.edit');
    Route::get('remove/{id}', 'remove')->name('applicant.remove');
    Route::get('add', 'add')->name('applicant.add');
    Route::get('add', 'save')->name( 'applicant.add.save');
    Route::get('edit/{id}', 'update')->name('applicant.add.update');
    */
});

Route::controller(EmployeeController::class)->prefix('admin/employee')->group(function () {
    Route::get('', 'index')->name('admin.employee.index');
    Route::get('create', 'create')->name('admin.employee.create');
    Route::post('create', 'save')->name('admin.employee.create.save');
    Route::get('edit/{idEmp}', 'edit')->name('admin.employee.edit');
    Route::put('edit/{idEmp}', 'update')->name('admin.employee.create.update');
    Route::delete('delete/{idEmp}', 'delete')->name('admin.employee.delete');
});

Route::controller(VisaApplicantController::class)->prefix('consultant/VisaApplicant')->group(function () {
    Route::get('', action: 'index')->name('applicantProcess');
    
});

Route::get('/login', [EmployeeLoginController::class, 'showLoginForm'])->name('employee.loginForm');
Route::post('/login', [EmployeeLoginController::class, 'login'])->name('employee.login');
Route::post('/logout', [EmployeeLoginController::class, 'logout'])->name('logout');

