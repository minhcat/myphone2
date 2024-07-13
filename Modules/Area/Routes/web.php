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

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('areas')->name('area.')->group(function() {
        Route::get('/', [AreaController::class, 'index'])->name('index');
        Route::get('/create', [AreaController::class, 'create'])->name('create');
        Route::post('/', [AreaController::class, 'store'])->name('store');
        Route::get('/{id}', [AreaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AreaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AreaController::class, 'update'])->name('update');
        Route::delete('/{id}', [AreaController::class, 'destroy'])->name('delete');
    });
});
