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

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('orders')->name('order.')->group(function() {
        Route::prefix('/{order_id}/details')->name('detail.')->group(function() {
            Route::get('/', [OrderDetailController::class, 'index'])->name('index');
            Route::get('/create', [OrderDetailController::class, 'create'])->name('create');
            Route::post('/', [OrderDetailController::class, 'store'])->name('store');
            Route::get('/{id}', [OrderDetailController::class, 'edit'])->name('edit');
            Route::put('/{id}', [OrderDetailController::class, 'update'])->name('update');
            Route::delete(('/{id}'), [OrderDetailController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('/{id}', [OrderController::class, 'show'])->name('show');
        Route::get('/{id}/invoice', [OrderController::class, 'showInvoice'])->name('show_invoice');
        Route::put('/{id}', [OrderController::class, 'update'])->name('update');
        Route::delete('/{id}', [OrderController::class, 'destroy'])->name('delete');
    });
});
