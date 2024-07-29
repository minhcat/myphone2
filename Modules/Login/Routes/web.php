<?php

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

use Illuminate\Support\Facades\Route;
use Modules\Login\Http\Controllers\LoginController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('login')->name('login.')->group(function() {
        Route::get('/', [LoginController::class, 'index'])->name('index');
        Route::post('/', [LoginController::class, 'login'])->name('login');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
        Route::post('/register', [LoginController::class, 'register'])->name('register');
    });
});
