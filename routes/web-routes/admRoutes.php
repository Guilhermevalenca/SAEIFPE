<?php

use Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\AdmController::class)
    ->middleware('auth')
    ->group(function () {

        Route::get('adm','index')->name('adm_index');
        Route::post('adm','newAdm')->name('adm_newAdm');

    });

