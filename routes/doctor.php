<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/**
 * Secure Doctor routes
 */
Route::group(['prefix' => "/doctor/", "middleware" => "role:doctor", "auth"], function () {

    /**
     * Dashboard Routes
     */
    Route::get('', [HomeController::class, 'doctor_dashboard'])->name('doctor_dashboard');
    Route::get('dashboard', [HomeController::class, 'doctor_dashboard'])->name('dashboard');
});
