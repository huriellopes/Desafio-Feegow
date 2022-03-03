<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\FeegowController;
use App\Http\Controllers\Web\SchedulesController as SchedulesControllerWEB;
use App\Http\Controllers\API\PatientController;
use App\Http\Controllers\API\SchedulesController;
use App\Http\Controllers\API\ProfessionalController;
use App\Http\Controllers\API\SpecialtiesController;

Route::group(['prefix' => '/'], function () {
    Route::resource('/', FeegowController::class, [
        'names' => [
            'index' => 'feegow.index'
        ]
    ])->except('create', 'store', 'update', 'show', 'edit', 'destroy');
    Route::resource('/professionals', FeegowController::class, [
        'names' => [
            'store' => 'feegow.store'
        ]
    ])->except('index', 'create', 'update', 'show', 'edit', 'destroy');

    Route::resource('/schedules', SchedulesControllerWEB::class, [
        'names' => [
            'index' => 'schedules/index',
            'store' => 'schedules/store'
        ]
    ])->except('create', 'update', 'show', 'edit', 'destroy');

    Route::group(['prefix' => '/api'], function () {
        Route::resource('/patients', PatientController::class)
            ->except('create', 'store', 'update', 'show', 'edit', 'destroy');
        Route::resource('/schedules', SchedulesController::class)
            ->except('create', 'update', 'show', 'edit', 'destroy');
        Route::resource('/professionals', ProfessionalController::class)
            ->except('index','create', 'update', 'show', 'edit', 'destroy');
        Route::resource('/specialties', SpecialtiesController::class)
            ->except('create', 'store', 'update', 'show', 'edit', 'destroy');
    });
});
