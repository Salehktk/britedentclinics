<?php

use App\Http\Controllers\AvailableTimeController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorSpecializationController;
use App\Http\Controllers\DoctorSpecializationServiceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/**
 * Secure Admin routes
 */
Route::group(['prefix' => "/superadmin/", "middleware" => "role:admin", "auth"], function () {

    /**
     * Dashboard Routes
     */
    Route::get('', [HomeController::class, 'super_dashboard'])->name('super_dashboard');
    Route::get('dashboard', [HomeController::class, 'super_dashboard'])->name('dashboard');

    /**
     * locations resource routes
     */
    Route::resource('locations', LocationController::class);

    /**
     * locations custom routes
     */
    Route::group(['prefix' => 'locations/', 'controller' => LocationController::class], function () {
        Route::post('edit', 'edit_location_response')->name('edit_location_response');
    });

    /**
     * Specializations resource routes
     */
    Route::resource('specialization', SpecializationController::class);

    /**
     * specialization custom Routes
     */
    Route::group(['prefix' => 'specialization/', 'controller' => SpecializationController::class], function () {
        Route::post('edit/form', 'edit_specialization_response')->name('edit_specialization_response');
    });

    /**
     * service resource routes
     */
    Route::resource('service', ServiceController::class);

    /**
     * service custom Routes
     */
    Route::group(['prefix' => 'service/', 'controller' => ServiceController::class], function () {
        Route::post('edit/service', 'edit_service_response')->name('edit_service_response');
    });

    /**
     * doctor resource routes
     */
    Route::resource('doctor', DoctorController::class);

    /**
     * Availability resource routes
     */
    Route::get('doctor/availability/{id}/create', [UserController::class, 'add_availability_view'])->name('add_availability_view');

    /**
     * get user data ajax route
     */
    Route::get('get/user/data/ajax/{id?}', [UserController::class, 'get_user_data_ajax'])->name('get_user_data_ajax');

    /**
     * doctor specialization resource routes
     */
    Route::resource('doctor-specialization', DoctorSpecializationController::class);
    Route::get('response_doctor_specialization_services_list/{id?}', [DoctorSpecializationController::class, 'response_doctor_specialization_services_list'])->name('response_doctor_specialization_services_list');
    Route::get('specialization_destroy/{id?}', [DoctorSpecializationController::class, 'specialization_destroy'])->name('specialization_destroy');

    /**
     * doctor specialization services resource routes
     */
    Route::get('specialization_service_destroy/{id?}', [DoctorSpecializationServiceController::class, 'specialization_service_destroy'])->name('specialization_service_destroy');

    /**
     * available time resource routes
     */
    Route::resource('available', AvailableTimeController::class);
});
