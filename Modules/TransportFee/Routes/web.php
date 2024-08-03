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
use Modules\TransportFee\Http\Controllers\TransportFeeAreaCaseController;
use Modules\TransportFee\Http\Controllers\TransportFeeAreaController;
use Modules\TransportFee\Http\Controllers\TransportFeeController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('transport_fees')->name('transport_fee.')->group(function() {
        Route::prefix('{transport_fee_id}/areas')->name('area.')->group(function() {
            Route::prefix('{transport_fee_area_id}/cases')->name('case.')->group(function() {
                Route::get('/', [TransportFeeAreaCaseController::class, 'index'])->name('index');
                Route::get('/create', [TransportFeeAreaCaseController::class, 'create'])->name('create');
                Route::post('/', [TransportFeeAreaCaseController::class, 'store'])->name('store');
                Route::get('/{id}/edit', [TransportFeeAreaCaseController::class, 'edit'])->name('edit');
                Route::put('/{id}', [TransportFeeAreaCaseController::class, 'update'])->name('update');
                Route::delete('/{id}', [TransportFeeAreaCaseController::class, 'destroy'])->name('delete');
            });

            Route::get('/', [TransportFeeAreaController::class, 'index'])->name('index');
            Route::get('/create', [TransportFeeAreaController::class, 'create'])->name('create');
            Route::post('/', [TransportFeeAreaController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [TransportFeeAreaController::class, 'edit'])->name('edit');
            Route::put('/{id}', [TransportFeeAreaController::class, 'update'])->name('update');
            Route::delete('/{id}', [TransportFeeAreaController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [TransportFeeController::class, 'index'])->name('index');
        Route::get('/create', [TransportFeeController::class, 'create'])->name('create');
        Route::post('/', [TransportFeeController::class, 'store'])->name('store');
        Route::get('/{id}', [TransportFeeController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TransportFeeController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TransportFeeController::class, 'update'])->name('update');
        Route::delete('/{id}', [TransportFeeController::class, 'destroy'])->name('delete');
    });
});
