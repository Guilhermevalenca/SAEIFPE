<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\FinishRegistrationController::class)
    ->group(function () {

        Route::get('finishRegistration','index')->name('finishRegistration_index');

    });

