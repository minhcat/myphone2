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
use Modules\Gift\Http\Controllers\GiftController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('gifts')->name('gift.')->group(function() {
        Route::get('/', [GiftController::class, 'index'])->name('index');
        Route::get('/create', [GiftController::class, 'create'])->name('create');
        Route::get('/{id}', [GiftController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [GiftController::class, 'edit'])->name('edit');
        Route::post('/', [GiftController::class, 'store'])->name('store');
        Route::put('/{id}', [GiftController::class, 'update'])->name('update');
        Route::delete('/{id}', [GiftController::class, 'destroy'])->name('delete');
    });
});
