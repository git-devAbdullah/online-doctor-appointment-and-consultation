<?php

use App\Http\Controllers\AuthDoctorController;
use App\Http\Controllers\AuthPatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\patient\PatientController;
use App\Http\Controllers\TimeslotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::group(['prefix' => 'doctor'], function() {
	Route::group(['middleware' => 'doctor.guest'], function(){
        Route::view('login','Doctor.login')->name('doctor.login');
        Route::get('register',[AuthDoctorController::class,'regForm']);
        Route::post('register',[AuthDoctorController::class,'register'])->name('doctor.register');
        Route::post('login',[AuthDoctorController::class,'authenticate']);

        Route::get('search',[DoctorController::class,'search_doctor']);
        Route::post('search',[DoctorController::class,'searchResultDoctor']);

	});
	Route::group(['middleware' => 'doctor.auth'], function(){
        Route::get('logout',[AuthDoctorController::class,'logout']);
        Route::get('dashboard',[DoctorController::class,'dashboard'])->name('doctor.dashboard');
        Route::get('schedule-timings',[DoctorController::class,'schedule_timings']);
        Route::post('schedule-timings/create',[TimeslotController::class,'create']);
        Route::delete('schedule-timings/{timeslotID}',[TimeslotController::class,'destroy']);
        Route::get('appointment-links',[DoctorController::class,'appointment_links']);
        Route::get('profile',[DoctorController::class,'profile']);
	});
});





Route::group(['prefix' => 'patient'], function() {
	Route::group(['middleware' => 'patient.guest'], function(){
        Route::view('login','Patient.login')->name('patient.login');
        Route::view('register','Patient.register');
        Route::post('register',[AuthPatientController::class,'register'])->name('patient.register');
        Route::post('login',[AuthPatientController::class,'authenticate']);
	});

	Route::group(['middleware' => 'patient.auth'], function(){
        Route::get('logout',[AuthPatientController::class,'logout']);
        Route::get('dashboard',[PatientController::class,'dashboard'])->name('patient.dashboard');
        Route::get('schedule-timings',[DoctorController::class,'schedule_timings']);
        Route::get('appointment-links',[DoctorController::class,'appointment_links']);
        Route::get('profile',[DoctorController::class,'profile']);
	});
});
