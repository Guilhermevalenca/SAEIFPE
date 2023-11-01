<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use \App\Http\Controllers\FormResponseController;

Route::controller(FormController::class)
    ->middleware('auth')
    ->whereNumber('id')
    ->group(function () {

        Route::get('forms','index')->name('forms_index');
        Route::get('forms/{id}','show')->name('forms_show');

        Route::post('forms','store')->name('forms_store');

        Route::get('forms/edit/{id}','edit')->name('forms_edit');
        Route::put('forms','update')->name('forms_update');

        Route::delete('forms/{id}','destroy')->name('forms_destroy');

        Route::get('forms/sendEmail','sendEmail')->name('forms_sendEmail');

    });

Route::controller(FormResponseController::class)
    ->middleware('auth')
    ->whereNumber('id')
    ->group(function () {

        Route::get('forms/response','index')->name('forms_index_response');
        Route::get('forms/response/{id}','show')->name('forms_show_response');
        Route::post('forms/response','store')->name('forms_store_response');

        Route::get('forms/responded/{id}', 'showByFormId')->name('forms_showByFormId_responded');

    });
