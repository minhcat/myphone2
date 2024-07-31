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
use Modules\Specification\Http\Controllers\InformationController;
use Modules\Specification\Http\Controllers\SpecificationController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('specifications')->name('specification.')->group(function() {
        Route::prefix('/{specification_id}/informations')->name('information.')->group(function() {
            Route::get('/', [InformationController::class, 'index'])->name('index');
            Route::get('/create', [InformationController::class, 'create'])->name('create');
            Route::get('/{id}', [InformationController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [InformationController::class, 'edit'])->name('edit');
            Route::post('/', [InformationController::class, 'store'])->name('store');
            Route::put('/{id}', [InformationController::class, 'update'])->name('update');
            Route::delete('/{id}', [InformationController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [SpecificationController::class, 'index'])->name('index');
        Route::get('/create', [SpecificationController::class, 'create'])->name('create');
        Route::get('/{id}', [SpecificationController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SpecificationController::class, 'edit'])->name('edit');
        Route::post('/', [SpecificationController::class, 'store'])->name('store');
        Route::put('/{id}', [SpecificationController::class, 'update'])->name('update');
        Route::delete('/{id}', [SpecificationController::class, 'destroy'])->name('delete');
    });
});
