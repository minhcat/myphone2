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
use Modules\Config\Http\Controllers\ConfigController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('configs')->name('config.')->group(function() {
        Route::get('/', [ConfigController::class, 'index'])->name('index');
        Route::get('/create', [ConfigController::class, 'create'])->name('create');
        Route::post('/', [ConfigController::class, 'store'])->name('store');
        Route::get('/{id}', [ConfigController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ConfigController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConfigController::class, 'update'])->name('update');
        Route::put('/{id}/reset', [ConfigController::class, 'reset'])->name('reset');
        Route::delete('/{id}', [ConfigController::class, 'destroy'])->name('delete');
    });
});
