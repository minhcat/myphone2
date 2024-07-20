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
use Modules\Transporter\Http\Controllers\TransporterCaseController;
use Modules\Transporter\Http\Controllers\TransporterController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('transporters')->name('transporter.')->group(function() {
        Route::prefix('{transporter_id}/cases')->name('case.')->group(function() {
            Route::get('/', [TransporterCaseController::class, 'index'])->name('index');
            Route::get('/create', [TransporterCaseController::class, 'create'])->name('create');
            Route::post('/', [TransporterCaseController::class, 'store'])->name('store');
            Route::get('/{id}', [TransporterCaseController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [TransporterCaseController::class, 'edit'])->name('edit');
            Route::put('/{id}', [TransporterCaseController::class, 'update'])->name('update');
            Route::delete('/{id}', [TransporterCaseController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [TransporterController::class, 'index'])->name('index');
        Route::get('/create', [TransporterController::class, 'create'])->name('create');
        Route::post('/', [TransporterController::class, 'store'])->name('store');
        Route::get('/{id}', [TransporterController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TransporterController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TransporterController::class, 'update'])->name('update');
        Route::delete('/{id}', [TransporterController::class, 'destroy'])->name('delete');
    });
});
