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
use Modules\Cart\Http\Controllers\CartController;
use Modules\Cart\Http\Controllers\CartDetailController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('carts')->name('cart.')->group(function() {
        Route::prefix('/{cart_id}/details')->name('detail.')->group(function() {
            Route::get('/', [CartDetailController::class, 'index'])->name('index');
            Route::get('/create', [CartDetailController::class, 'create'])->name('create');
            Route::get('/{id}/edit', [CartDetailController::class, 'edit'])->name('edit');
            Route::post('/', [CartDetailController::class, 'store'])->name('store');
            Route::put('/{id}', [CartDetailController::class, 'update'])->name('update');
            Route::delete('/{id}', [CartDetailController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::get('/{id}', [CartController::class, 'show'])->name('show');
        Route::post('/{id}', [CartController::class, 'order'])->name('order');
    });
});
