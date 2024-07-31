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
use Modules\City\Http\Controllers\DistrictController;
use Modules\City\Http\Controllers\WardController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('cities')->name('city.')->group(function() {
        Route::prefix('/{city_id}/districts')->name('district.')->group(function() {
            Route::prefix('/{district_id}/wards')->name('ward.')->group(function() {
                Route::get('/', [WardController::class, 'index'])->name('index');
                Route::get('/create', [WardController::class, 'create'])->name('create');
                Route::get('/{id}', [WardController::class, 'show'])->name('show');
                Route::get('/{id}/edit', [WardController::class, 'edit'])->name('edit');
                Route::post('/', [WardController::class, 'store'])->name('store');
                Route::put('/{id}', [WardController::class, 'update'])->name('update');
                Route::delete('/{id}', [WardController::class, 'destroy'])->name('delete');
            });
    
            Route::get('/', [DistrictController::class, 'index'])->name('index');
            Route::get('/create', [DistrictController::class, 'create'])->name('create');
            Route::get('/{id}', [DistrictController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [DistrictController::class, 'edit'])->name('edit');
            Route::post('/', [DistrictController::class, 'store'])->name('store');
            Route::put('/{id}', [DistrictController::class, 'update'])->name('update');
            Route::delete('/{id}', [DistrictController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [CityController::class, 'index'])->name('index');
        Route::get('/create', [CityController::class, 'create'])->name('create');
        Route::get('/{id}', [CityController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CityController::class, 'edit'])->name('edit');
        Route::post('/', [CityController::class, 'store'])->name('store');
        Route::put('/{id}', [CityController::class, 'update'])->name('update');
        Route::delete('/{id}', [CityController::class, 'destroy'])->name('delete');
    });
});
