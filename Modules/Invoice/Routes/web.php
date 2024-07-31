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
use Modules\Invoice\Http\Controllers\InvoiceController;
use Modules\Invoice\Http\Controllers\InvoiceDetailController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('invoices')->name('invoice.')->group(function() {
        Route::prefix('/{id}/details')->name('detail.')->group(function() {
            Route::get('/', [InvoiceDetailController::class, 'index'])->name('index');
        });
        Route::get('/', [InvoiceController::class, 'index'])->name('index');
        Route::get('/{id}', [InvoiceController::class, 'show'])->name('show');
        Route::get('/{id}/invoice', [InvoiceController::class, 'showInvoice'])->name('show_invoice');
    });
});
