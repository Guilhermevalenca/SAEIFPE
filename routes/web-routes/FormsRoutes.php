<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use \App\Http\Controllers\FormResponseController;

Route::controller(FormController::class)
    ->middleware('auth')
    ->whereNumber('id')
    ->group(function () {

        Route::get('forms','index')->name('forms_index');
        Route::get('forms/{id}','show');
        Route::post('forms','store')->name('forms_store');
        Route::delete('forms/{id}','destroy')->name('forms_destroy');

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

                Route::get('forms/response','index')->name('forms_index_response');
                Route::post('forms/response','store')->name('forms_store_response');

            });

        Route::middleware('auth')
            ->group(function () {

                Route::get('forms/response/{id}','showByFormId');

            });

    });
