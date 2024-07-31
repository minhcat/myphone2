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
use Modules\TransportFee\Http\Controllers\TransportFeeController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('transport_fees')->name('transport_fee.')->group(function() {
        Route::get('/', [TransportFeeController::class, 'index'])->name('index');
        Route::get('/create', [TransportFeeController::class, 'create'])->name('create');
        Route::post('/', [TransportFeeController::class, 'store'])->name('store');
        Route::get('/{id}', [TransportFeeController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TransportFeeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TransportFeeController::class, 'update'])->name('update');
        Route::delete('/{id}', [TransportFeeController::class, 'destroy'])->name('delete');
    });
});
