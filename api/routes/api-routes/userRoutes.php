<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::whereNumber('id')
    ->group(function () {

        Route::controller(UserController::class)
            ->group(function () {
                Route::post('users/create','store');

                Route::middleware('auth:sanctum')
                    ->group(function () {
                        Route::put('users','update');
                        Route::delete('users','destroy');
                    });
            });

        Route::controller(AuthController::class)
            ->group(function () {
                Route::post('users/login','login');

                Route::middleware('auth:sanctum')
                    ->group(function () {
                       Route::post('users/logout','logout');
                       Route::get('users/me','me');
                    });
            });
    });
