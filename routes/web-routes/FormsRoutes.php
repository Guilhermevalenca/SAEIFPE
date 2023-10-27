<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use \App\Http\Controllers\FormResponseController;

Route::controller(FormController::class)
    ->middleware('auth')
    ->whereNumber('id')
    ->group(function () {

        Route::get('forms','index');
        Route::get('forms/{id}','show');
        Route::post('forms','store');
        Route::delete('forms/{id}','destroy');

    });

Route::controller(FormController::class)
    ->middleware('auth')
    ->whereNumber('id')
    ->group(function () {

        Route::get('forms/{id}','show');

    });

Route::controller(FormResponseController::class)
    ->whereNumber('id')
    ->group(function () {

        Route::middleware('auth')
            ->group(function () {

                Route::get('forms/users','index');
                Route::post('forms/response','store');

            });

        Route::middleware('auth')
            ->group(function () {

                Route::get('forms/response/{id}','showByFormId');

            });

    });
