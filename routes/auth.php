<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DoctorController;
use App\Http\Controllers\Auth\Ray_EmployeeController;
use App\Http\Controllers\Auth\Lab_EmployeeController;
use App\Http\Controllers\Auth\PatientController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);


//#############################   Route User #########################

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.user');

//############################# End Route User #########################
Route::post('login/admin', [AdminController::class, 'store'])->name('login.admin');

//#############################   Route Admin #########################

Route::post('login/doctor', [DoctorController::class, 'store'])->name('login.doctor');
//#############################   Route doctor #########################
Route::post('login/Ray_Employee', [Ray_EmployeeController::class, 'store'])->name('login.Ray_Employee');

//#############################   Route Ray_Employee #########################


Route::post('login/lab_employee', [Lab_EmployeeController::class, 'store'])->name('login.lab_employee');


// ####################################################################


//#############################   Route Ray_Employee #########################


Route::post('login/patient', [PatientController::class, 'store'])->name('login.patient');


// ####################################################################
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');


    // logout user
    Route::post('logout/user', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout.user');
//logout admin
                
    Route::post('logout/admin', [AdminController::class, 'destroy'])->middleware('auth:admin')
    ->name('logout.admin');

    Route::post('logout/doctor', [DoctorController::class, 'destroy'])->middleware('auth:doctor')
    ->name('logout.doctor');

    Route::post('logout/Ray_Employee', [Ray_EmployeeController::class, 'destroy'])->middleware('auth:ray_employee')
    ->name('logout.Ray_Employee');

    Route::post('logout/lab_employee', [Lab_EmployeeController::class, 'destroy'])->middleware('auth:lab_employee')
    ->name('logout.lab_employee');

    Route::post('logout/patient', [PatientController::class, 'destroy'])->middleware('auth:patient')
    ->name('logout.patient');
});
