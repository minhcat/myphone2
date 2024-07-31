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
use Modules\Attribute\Http\Controllers\AttributeController;
use Modules\Attribute\Http\Controllers\OptionController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('attributes')->name('attribute.')->group(function() {
        Route::prefix('/{attribute_id}/options')->name('option.')->group(function() {
            Route::get('/', [OptionController::class, 'index'])->name('index');
            Route::get('/create', [OptionController::class, 'create'])->name('create');
            Route::get('/{id}', [OptionController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [OptionController::class, 'edit'])->name('edit');
            Route::post('/', [OptionController::class, 'store'])->name('store');
            Route::put('/{id}', [OptionController::class, 'update'])->name('update');
            Route::delete('/{id}', [OptionController::class, 'destroy'])->name('delete');
        });

        Route::get('/', [AttributeController::class, 'index'])->name('index');
        Route::get('/create', [AttributeController::class, 'create'])->name('create');
        Route::get('/{id}', [AttributeController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AttributeController::class, 'edit'])->name('edit');
        Route::post('/', [AttributeController::class, 'store'])->name('store');
        Route::put('/{id}', [AttributeController::class, 'update'])->name('update');
        Route::delete('/{id}', [AttributeController::class, 'destroy'])->name('delete');
    });
});
