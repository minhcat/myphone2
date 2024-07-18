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
use Modules\Area\Http\Controllers\AreaController;
use Modules\Area\Http\Controllers\AreaDetailController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('areas')->name('area.')->group(function() {
        Route::prefix('/{area_id}/details')->name('detail.')->group(function() {
            Route::get('/', [AreaDetailController::class, 'index'])->name('index');
            Route::get('/create', [AreaDetailController::class, 'create'])->name('create');
            Route::post('/', [AreaDetailController::class, 'store'])->name('store');
            Route::get('/{id}', [AreaDetailController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AreaDetailController::class, 'edit'])->name('edit');
            Route::put('/{id}', [AreaDetailController::class, 'update'])->name('update');
            Route::delete('/{id}', [AreaDetailController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [AreaController::class, 'index'])->name('index');
        Route::get('/create', [AreaController::class, 'create'])->name('create');
        Route::post('/', [AreaController::class, 'store'])->name('store');
        Route::get('/{id}', [AreaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AreaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AreaController::class, 'update'])->name('update');
        Route::delete('/{id}', [AreaController::class, 'destroy'])->name('delete');
    });
});
