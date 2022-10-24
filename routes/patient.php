<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Secure Patient routes
 */
Route::group(['prefix' => "/patient/", "middleware" => "role:patient", "auth"], function () {

    /**
     * Dashboard Routes
     */
    Route::get('', [HomeController::class, 'patient_dashboard'])->name('patient_dashboard');
    Route::get('dashboard', [HomeController::class, 'patient_dashboard'])->name('dashboard');
});
