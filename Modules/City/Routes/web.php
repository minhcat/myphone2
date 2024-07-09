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
use Modules\City\Http\Controllers\CityController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('city')->group(function() {
        Route::get('/', [CityController::class, 'index'])->name('index');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::get('/{id}', [CityController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CityController::class, 'edit'])->name('edit');
        Route::post('/', [CityController::class, 'store'])->name('store');
        Route::put('/{id}', [CityController::class, 'update'])->name('update');
        Route::delete('/{id}', [CityController::class, 'destroy'])->name('delete');
    });
});
