<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepositionsController;

Route::controller(DepositionsController::class)
    //->middleware(['auth:sanctum','ability:adm,manage,analyst'])
    ->group(function () {

        Route::get('depoimentos/mural','index')->name('depoimentos_mural');
        Route::get('depoimentos/adm','approve')->name('depoimentos_adm');
        Route::post('depoimentos/criar','store')->name('depoimentos_criar');
        Route::patch('depoimentos/aprovar/{depositions}', 'update_approved')->name('depoimentos_aprovar');
        Route::delete('depoimentos/apagar/{depositions}', 'destroy')->name('apagar_depoimento');
    });
