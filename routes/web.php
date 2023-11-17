<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
A home da pagina se encontra no arquivo web-routes/postsIFPERoutes.php

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

A home da pagina se encontra no arquivo web-routes/postsIFPERoutes.php

A home da pagina se encontra no arquivo web-routes/postsIFPERoutes.php

A home da pagina se encontra no arquivo web-routes/postsIFPERoutes.php
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'updateProfilePicture'])->name('profile_updateProfilePicture');
});

Route::controller(\App\Http\Controllers\TestController::class)
    ->group(function () {

        Route::get('test','index')->name('test_index');
        Route::post('test','store')->name('test_store');

    });

require __DIR__.'/auth.php';

