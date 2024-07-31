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
use Modules\Voucher\Http\Controllers\VoucherCodeController;
use Modules\Voucher\Http\Controllers\VoucherController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('vouchers')->name('voucher.')->group(function() {
        Route::prefix('/{voucher_id}/codes')->name('code.')->group(function() {
            Route::get('/', [VoucherCodeController::class, 'index'])->name('index');
            Route::get('/create', [VoucherCodeController::class, 'create'])->name('create');
            Route::get('/{id}', [VoucherCodeController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [VoucherCodeController::class, 'edit'])->name('edit');
            Route::post('/', [VoucherCodeController::class, 'store'])->name('store');
            Route::put('/{id}', [VoucherCodeController::class, 'update'])->name('update');
            Route::delete('/{id}', [VoucherCodeController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [VoucherController::class, 'index'])->name('index');
        Route::get('/create', [VoucherController::class, 'create'])->name('create');
        Route::get('/{id}', [VoucherController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [VoucherController::class, 'edit'])->name('edit');
        Route::post('/', [VoucherController::class, 'store'])->name('store');
        Route::put('/{id}', [VoucherController::class, 'update'])->name('update');
        Route::delete('/{id}', [VoucherController::class, 'destroy'])->name('delete');
    });
});
