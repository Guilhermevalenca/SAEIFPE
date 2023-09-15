<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::prefix('users')
    ->controller(UserController::class)
    ->whereNumber('id')
    ->group(function () {

        Route::post('create','store');


    });
