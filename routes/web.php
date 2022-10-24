<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorServicesController;
use App\Http\Controllers\DoctorServicesFieldsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TimeSlotController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

Route::get('/clear', function () {

    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');

    return "Cleared";
});

Route::get('booking/guest', function () {
    return view('appointments.add');
})->name('booking_guest');
