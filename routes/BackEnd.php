<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\PaymentaccountController;
use App\Http\Controllers\Doctor\InvoicController;
use App\Http\Controllers\Doctor\DiagnosticController;
use App\Http\Controllers\Doctor\RayController;
use App\Http\Controllers\Doctor\LaboratoryController;
use App\Http\Controllers\Doctor\Ray_EmployeeController;
use App\Http\Controllers\Ray_Employee\InviocController;
use App\Http\Controllers\Doctor\LaboratorieEmployeeController;
use App\Http\Controllers\Laboratorie_Employee\Invioc_labController;
use App\Http\Controllers\dashboard_patient\PatientsController;


Route::get('/Dashboard_Admin',[DashboardController::class,'index']);




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 


        // ##################### dashboard.user  ##############################
Route::get('/dashboard/user', function () {
    return view('Dashboard.User.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');


        // ##################### end dashboard.user  ##############################


 // ##################### dashboard.admin ##############################
Route::get('/dashboard/admin', function () {
    return view('Dashboard.Admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard.admin');


 // ##################### end dashboard.admin ##############################


 Route::get('/dashboard/doctor', function () {
    return view('Dashboard.Doctor.dashboard');
})->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');


 // ##################### end dashboard.admin ##############################


 Route::get('/dashboard/ray_employee', function () {
    return view('Dashboard.ray_employee.dashboard');
})->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');

// ##################### Auth ##############################


// ##################### end dashboard.admin ##############################


Route::get('/dashboard/lab_employee', function () {
    return view('Dashboard.laboratorie_employee.dashboard');
})->middleware(['auth:lab_employee', 'verified'])->name('dashboard.lab_employee');

// ##################### Auth ##############################


// ##################### end dashboard.admin ##############################


Route::get('/dashboard/patient', function () {
    return view('Dashboard.Patient_Dashboard.dashboard');
})->middleware(['auth:patient', 'verified'])->name('dashboard.patient');

// ##################### Auth ##############################

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// ------------------------------------------------------------------------------------



Route::middleware('auth:admin')->group(function () {
// SectionController
    Route::resource('section',SectionController::class);

    // DoctorController
    Route::resource('Doctor', DoctorController::class);
    Route::post('update_password',[DoctorController::class,'update_password'])->name('update_password');
    Route::post('update_status',[DoctorController::class,'update_status'])->name('update_status'); 

       // ServiceController
       Route::resource('Service',ServiceController::class);
    //   Add_Service(livewire)
       Route::view('Add_Service','livewire.GroupService.include_create')->name('Add_Service'); 
// InsuranceController
       Route::resource('Insurance',InsuranceController::class);
    //    AmbulanceController
       Route::resource('Ambulance',AmbulanceController::class);

         //    PatientController
         Route::resource('Patient',PatientController::class);

         Route::view('single-invoices','livewire.single-invoices.index')->name('single-invoices');
         Route::view('Print_single_invoices','livewire.single-invoices.print')->name('Print_single_invoices');
         
         Route::resource('ReceiptAccount',ReceiptAccountController::class);
         Route::resource('Payment',PaymentaccountController::class);
         Route::view('GroupInvoice','livewire.GroupInvoice.index')->name('GroupInvoice');
         Route::view('Print_group_invoices','livewire.GroupInvoice.print')->name('Print_group_invoices');

         Route::resource('Ray_Employee',Ray_EmployeeController::class);

         Route::resource('Laboratorie_Employee',LaboratorieEmployeeController::class);

         
});


Route::middleware('auth:doctor')->group(function () {


    // SectionController
    Route::resource('Doctor_invoice',InvoicController::class);
    Route::get('completed_invoices',[InvoicController::class ,'completed_invoices'])->name('completed_invoices');
    Route::get('review_invoices',[InvoicController::class ,'review_invoices'])->name('review_invoices');

    
    Route::resource('Diagnostics',DiagnosticController::class);
    Route::post('Diagnostics/add_review',[DiagnosticController::class,'add_review'])->name('add_review');

    Route::resource('Ray',RayController::class);

    Route::resource('Laboratory',LaboratoryController::class);
    

});


Route::middleware('auth:ray_employee')->group(function () {

    Route::resource('rayemployee_invoice',InviocController::class);


});



Route::middleware('auth:lab_employee')->group(function () {

    Route::resource('Labemployee_invoice',Invioc_labController::class);


});

Route::middleware('auth:patient')->group(function () {

    Route::get('patient_invoices',[PatientsController::class ,'getInvioc'])->name('patient_invoices');
    Route::get('patient_Rays',[PatientsController::class ,'getRay'])->name('patient_Rays');
    Route::get('patient_Labs',[PatientsController::class ,'getLab'])->name('patient_Labs');
    Route::resource('Ray_patient',RayController::class);
    Route::resource('Laboratory_patient',LaboratoryController::class);

});

// Route::get('/404', function () {
//     return view('Dashboard.404');
// })->name('404');


require __DIR__.'/auth.php';

    });




