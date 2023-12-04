<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsIfpeController;

Route::controller(PostsIfpeController::class)
    ->group(function () {

        Route::get('/','index')->name('home');

        Route::middleware('auth')
            ->group(function () {

                Route::get('/posts/create', 'create')->name('posts_create');
                Route::post('/posts/create', 'store')->name('posts_store');

                Route::get('/posts/edit/{id}', 'edit')->name('posts_edit');
                Route::post('/posts/update/{id}', 'update')->name('posts_update');

                Route::delete('/posts/delete/{id}', 'destroy')->name('posts_delete');
            });

    });
