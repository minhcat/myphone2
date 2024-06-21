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
use Modules\Sale\Http\Controllers\SaleController;

Route::prefix('admin')->group(function() {
    Route::prefix('sales')->name('sale.')->group(function() {
        Route::get('/', [SaleController::class, 'index'])->name('index');
        Route::get('/create', [SaleController::class, 'create'])->name('create');
        Route::get('/{id}', [SaleController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SaleController::class, 'edit'])->name('edit');
        Route::post('/', [SaleController::class, 'store'])->name('store');
        Route::put('/{id}', [SaleController::class, 'update'])->name('update');
        Route::delete('/{id}', [SaleController::class, 'destroy'])->name('delete');
    });
});
