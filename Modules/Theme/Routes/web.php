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
use Modules\Theme\Http\Controllers\ThemeController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('themes')->name('theme.')->group(function() {
        Route::get('/', [ThemeController::class, 'index'])->name('index');
        Route::put('/{id}/update', [ThemeController::class, 'update'])->name('update');
    });
});
