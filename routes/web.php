<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
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


Route::group(['middleware' => ['auth']], function () {
    /**
     * Secure Admin routes
     */
    Route::group(['prefix' => '/superadmin/', "middleware" => "role:admin"], function () {

        /**
         * Dashboard Routes
         */
        Route::get('', [HomeController::class, 'super_dashboard'])->name('super_dashboard');
        Route::get('dashboard', [HomeController::class, 'super_dashboard'])->name('dashboard');

        Route::get('locations', [LocationController::class, 'locations'])->name('locations');
        Route::post('add_location', [LocationController::class, 'add_location'])->name('add_location');
        Route::get('delete-location/{id}', [LocationController::class, 'delete_location'])->name('delete_location');
    });

    /**
     * Secure Doctor routes
     */
    Route::group(['prefix' => "/doctor/", "middleware" => "role:doctor"], function () {

        /**
         * Dashboard Routes
         */
        Route::get('', [HomeController::class, 'doctor_dashboard'])->name('doctor_dashboard');
        Route::get('dashboard', [HomeController::class, 'doctor_dashboard'])->name('dashboard');
    });

    /**
     * Secure Patient routes
     */
    Route::group(['prefix' => "/patient/", "middleware" => "role:patient"], function () {

        /**
         * Dashboard Routes
         */
        Route::get('', [HomeController::class, 'patient_dashboard'])->name('patient_dashboard');
        Route::get('dashboard', [HomeController::class, 'patient_dashboard'])->name('dashboard');
    });
});
