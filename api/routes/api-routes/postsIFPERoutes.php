<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsIfpeController;

Route::prefix('postsIfpe')
    ->controller(PostsIfpeController::class)
    ->middleware(['auth:sanctum','ability:adm,manage,analyst'])
    ->group(function () {

        Route::post('','store');

    });
