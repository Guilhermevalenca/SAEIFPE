<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsIfpeController;

Route::controller(PostsIfpeController::class)
    ->middleware(['auth:sanctum','ability:adm'])
    ->group(function () {

        Route::get('postsIfpe','index');
        Route::post('postsIfpe','store');

    });
