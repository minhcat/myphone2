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
use Modules\Gift\Http\Controllers\GiftProductController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('gifts')->name('gift.')->group(function() {
        Route::prefix('/{gift_id}/product')->name('product.')->group(function() {
            Route::get('/', [GiftProductController::class, 'index'])->name('index');
            Route::get('/create', [GiftProductController::class, 'create'])->name('create');
            Route::get('/{id}', [GiftProductController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [GiftProductController::class, 'edit'])->name('edit');
            Route::post('/', [GiftProductController::class, 'store'])->name('store');
            Route::put('/{id}', [GiftProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [GiftProductController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [GiftController::class, 'index'])->name('index');
        Route::get('/create', [GiftController::class, 'create'])->name('create');
        Route::get('/{id}', [GiftController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [GiftController::class, 'edit'])->name('edit');
        Route::post('/', [GiftController::class, 'store'])->name('store');
        Route::put('/{id}', [GiftController::class, 'update'])->name('update');
        Route::delete('/{id}', [GiftController::class, 'destroy'])->name('delete');
    });
});
