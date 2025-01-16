<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\authController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisaApplicantController;
use App\Http\Controllers\Auth\EmployeeAuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainDocumentController;
use App\Http\Controllers\VisaController;
use App\Http\Controllers\PaymentController;


// Route::prefix('')->group(function () {
//     Route::get('/login', [EmployeeAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('/login', [EmployeeAuthController::class, 'login'])->name('admin.login.submit');
// });


Route::get('', [EmployeeAuthController::class, 'showLoginForm'])->name('login.form'); 
Route::post('login', [EmployeeAuthController::class, 'login'])->name('login'); 
Route::post('logout', [EmployeeAuthController::class, 'logout'])->name('logout'); 


// Route::middleware(['auth:employee'])->group(function () {
//     // Dashboard untuk Admin
//     Route::get('/admin/dashboard', function () {
//         return view('admin.dashboard'); 
//     })->name('admin.dashboard');

//     // Dashboard untuk Consultant
//     Route::get('/consultant/dashboard', function () {
//         return view('consultant.dashboard'); 
//     })->name('consultant.dashboard');
// });

Route::middleware(['auth:employee'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::get('/consultant/dashboard', [DashboardController::class, 'consultantDashboard'])->name('consultant.dashboard');

Route::middleware(['auth:employee'])->group(function () {
    Route::get('/consultant/dashboard', [DashboardController::class, 'consultantDashboard'])->name('consultant.dashboard');
});

Route::middleware(['auth:employee'])->group(function () {
    Route::get('/applicant', [EmployeeController::class, 'indexCons'])->name('applicant.index');
});

Route::get('/admin/applicant', [ApplicantController::class, 'index'])->middleware('auth:employee')->name('admin.applicant');

Route::get('/consultant/applicant', [ApplicantController::class, 'index'])->middleware('auth:employee')->name('consultant.applicant');
Route::get('/consultant/applicant/{idApplicant}', [ApplicantController::class, 'detail'])->name('consultant.applicant.detail');

Route::get('/consultant/document', [MainDocumentController::class, 'index'])->middleware('auth:employee')->name('consultant.document');




// Ini Route Buat Applicant
Route::controller(ApplicantController::class)->prefix('applicant')->group(function () {
    Route::get('home', [ApplicantController::class, 'home'])->name('applicant.home');
    Route::get('pengajuan-visa/upload-data-pribadi', [ApplicantController::class, 'uploadDP'])->name('applicant.uploadDP');
    Route::get('pengajuan-visa/upload-dokumen', [ApplicantController::class, 'uploadDoc'])->name('applicant.uploadDoc');
    Route::get('pengajuan-visa/upload-keterangan-visa', [ApplicantController::class, 'uploadKV'])->name('applicant.uploadKV');
    Route::get('pengajuan-visa/upload-done', [ApplicantController::class, 'done'])->name('applicant.upload-done');
    Route::get('status-pengajuan', [ApplicantController::class, 'statusPengajuan'])->name('applicant.status-pengajuan');
    Route::get('pembayaran-visa', [ApplicantController::class, 'pembayaranVisa'])->name('applicant.pembayaran-visa');
});




Route::controller(ApplicantController::class)->prefix('admin/applicant')->group(function () {
    Route::get('', 'index')->name('admin.applicant.index');
    Route::get('create', 'create')->name('admin.applicant.create');
    Route::post('create', 'save')->name('admin.applicant.create.save');
    Route::get('edit/{idApplicant}', 'edit')->name('admin.applicant.edit');
    Route::put('edit/{idApplicant}', 'update')->name('admin.applicant.create.update');
    Route::delete('delete/{idApplicant}', action: 'delete')->name('admin.applicant.delete');
    Route::get('detail/{idApplicant}', 'detail')->name('admin.applicant.detail');

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
/* employee */ 


Route::controller(EmployeeController::class)->prefix('admin/employee')->group(function () {
    Route::get('', 'index')->name('admin.employee.index');
    Route::get('create', 'create')->name('admin.employee.create');
    Route::post('create', 'save')->name('admin.employee.create.save');
    Route::get('edit/{idEmp}', 'edit')->name('admin.employee.edit');
    Route::put('edit/{idEmp}', 'update')->name('admin.employee.create.update');
    Route::delete('delete/{idEmp}', 'delete')->name('admin.employee.delete');
});

/* country */ 
Route::controller(CountryController::class)->prefix('admin/country')->group(function () {
    Route::get('', 'index')->name('admin.country.index');
    Route::get('create', 'create')->name('admin.country.create');
    Route::post('create', 'save')->name('admin.country.create.save');
    Route::get('edit/{idCountry}', 'edit')->name('admin.country.edit');
    Route::put('edit/{idCountry}', 'update')->name('admin.country.create.update');
    Route::delete('delete/{idCountry}', 'delete')->name('admin.country.delete');
});

Route::controller(VisaController::class)->prefix('admin/visa')->group(function () {
    Route::get('', 'index')->name('admin.visa.index');
    Route::get('create', 'create')->name('admin.visa.create');
    Route::post('create', 'save')->name('admin.visa.create.save');
    Route::get('edit/{idFee}', 'edit')->name('admin.visa.edit');
    Route::put('edit/{idFee}', 'update')->name('admin.visa.create.update');
    Route::delete('delete/{idFee}', 'delete')->name('admin.visa.delete');
    Route::post('index/filter', 'filter')->name('admin.visa.index.filter');
    Route::get('index/filter=jenis')->name('admin.visa.index.filter.jenis');
    Route::get('index/filter=negara')->name('admin.visa.index.filter.negara');
    
});


Route::controller(VisaApplicantController::class)->prefix('admin/visaApplicant')->group(function () {
    Route::get('', 'index')->name('admin.visaApplicant.index');
    Route::get('create', 'create')->name('admin.visaApplicant.create');
    Route::post('create', 'save')->name('admin.visaApplicant.create.save');
    Route::get('edit/{idVisa}', 'edit')->name('admin.visaApplicant.edit');
    Route::put('edit/{idVisa}', 'update')->name('admin.visaApplicant.create.update');
    Route::delete('delete/{idVisa}', 'delete')->name('admin.visaApplicant.delete');
    Route::get('detail/{idVisa}', 'detail')->name('admin.visaApplicant.detail');
});

Route::controller(MainDocumentController::class)->prefix('admin/document')->group(function () {
    Route::get('', 'index')->name('admin.document.index');
    Route::get('create', 'create')->name('admin.document.create');
    Route::post('create', 'save')->name('admin.document.create.save');
    Route::get('edit/{idVisa}', 'edit')->name('admin.document.edit');
    Route::put('edit/{idVisa}', 'update')->name('admin.document.create.update');
    Route::delete('delete/{idVisa}', 'delete')->name('admin.document.delete');
    Route::get('detail/{idVisa}', 'detail')->name('admin.document.detail');
});

Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');




