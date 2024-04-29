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
use Modules\Product\Http\Controllers\DetailController;
use Modules\Product\Http\Controllers\ProductController;
use Modules\Product\Http\Controllers\VariationController;

Route::prefix('admin')->group(function() {
    Route::prefix('products')->name('product.')->group(function() {
        Route::prefix('/{product_id}/variations')->name('variation.')->group(function() {
            Route::get('/', [VariationController::class, 'index'])->name('index');
            Route::get('/create', [VariationController::class, 'create'])->name('create');
            Route::get('/{id}', [VariationController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [VariationController::class, 'edit'])->name('edit');
            Route::post('/', [VariationController::class, 'store'])->name('store');
            Route::put('/{id}', [VariationController::class, 'update'])->name('update');
            Route::delete('/{id}', [VariationController::class, 'destroy'])->name('delete');
        });

        Route::prefix('{product_id}/details')->name('detail.')->group(function() {
            Route::get('/', [DetailController::class, 'index'])->name('index');
            Route::get('/edit', [DetailController::class, 'edit'])->name('edit');
            Route::post('/', [DetailController::class, 'update'])->name('update');
        });

        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
        Route::post('/', [ProductController::class, 'store'])->name('store');
        Route::put('/{id}', [ProductController::class, 'update'])->name('update');
        Route::delete('/{id}', [ProductController::class, 'destroy'])->name('delete');
    });
});
