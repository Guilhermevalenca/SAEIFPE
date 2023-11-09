<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\FinishRegistrationController::class)
    ->middleware('auth')
    ->group(function () {

        Route::get('finishRegistration','index')->name('finishRegistration_index');

        Route::post('finishRegistrationStudent','storeStudent')->name('finishRegistration_storeStudent');

        Route::post('finishRegistrationGraduate', 'storeGraduate')->name('finishRegistration_storeGraduate');

    });

