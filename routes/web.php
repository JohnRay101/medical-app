<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;  
use App\Http\Controllers\AppointmentController;  



Route::get('/', function () {
    return view('welcome');
});
Route::resource('/users', UserController::class);
Route::resource('/patients', PatientController::class);
Route::resource('/doctors', DoctorController::class);
Route::resource('/appointments', AppointmentController::class);
Auth::routes();

//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
   
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
   
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    
});
   
//Admin Routes List
Route::middleware(['auth', 'user-access:staff'])->group(function () {
   
    Route::get('/staff/home', [HomeController::class, 'staffHome'])->name('staff.home');
});

Route::middleware(['auth', 'user-access:doctor'])->group(function () {
   
    Route::get('/doctor/home', [HomeController::class, 'staffHome'])->name('staff.home');
});