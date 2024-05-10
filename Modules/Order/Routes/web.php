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
use Modules\Order\Http\Controllers\OrderController;
use Modules\Order\Http\Controllers\OrderDetailController;

Route::prefix('admin')->group(function() {
    Route::prefix('orders')->name('order.')->group(function() {
        Route::prefix('/{order_id}/details')->name('detail.')->group(function() {
            Route::get('/', [OrderDetailController::class, 'index'])->name('index');
            Route::post('/', [OrderDetailController::class, 'create'])->name('create');
            Route::put('/{id}', [OrderDetailController::class, 'edit'])->name('edit');
        });

        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::put('/{id}', [OrderController::class, 'update'])->name('update');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('delete');
    });
});
