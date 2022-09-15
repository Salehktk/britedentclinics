<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FieldController;
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

        /**
         * locations Routes
         */
        Route::group(['prefix' => 'locations/'], function () {
            Route::get('', [LocationController::class, 'locations'])->name('locations');
            Route::post('add_location', [LocationController::class, 'add_location'])->name('add_location');
            Route::get('delete/{id}', [LocationController::class, 'delete_location'])->name('delete_location');
            Route::post('edit', [LocationController::class, 'edit_location_response'])->name('edit_location_response');
            Route::get('edit/{id?}', [LocationController::class, 'edit_location'])->name('edit_location');
        });

        /**
         * Services Routes
         */
        Route::group(['prefix' => 'services/'], function () {
            Route::get('', [ServiceController::class, 'services'])->name('services');
            Route::post('add_service', [ServiceController::class, 'add_service'])->name('add_service');
            Route::get('delete_service/{id}', [ServiceController::class, 'delete_service'])->name('delete_service');
            Route::post('edit_service', [ServiceController::class, 'edit_service_response'])->name('edit_service_response');
            Route::get('edit_service/{id?}', [ServiceController::class, 'edit_service'])->name('edit_service');
        });

        /**
         * Doctor Routes
         */
        Route::group(['prefix' => 'doctors/'], function () {
            Route::get('fields', [FieldController::class, 'fields'])->name('fields');
            Route::post('add_field', [FieldController::class, 'add_field'])->name('add_field');
            Route::get('delete_field/{id}', [FieldController::class, 'delete_field'])->name('delete_field');
            Route::post('edit_field', [FieldController::class, 'edit_field_response'])->name('edit_field_response');
            Route::get('edit_field/{id?}', [FieldController::class, 'edit_field'])->name('edit_field');
        });
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
