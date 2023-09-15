<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::prefix('users')
    ->whereNumber('id')
    ->group(function () {

        Route::controller(UserController::class)
            ->group(function () {
                Route::post('create','store');
            });
        Route::controller(AuthController::class)
            ->group(function () {
                Route::post('login','login');

                Route::middleware('auth:sanctum')
                    ->group(function () {
                       Route::post('logout','logout');
                       Route::get('me','me');
                    });
            });
    });
