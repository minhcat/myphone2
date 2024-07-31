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
use Modules\Promotion\Http\Controllers\PromotionController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('promotions')->name('promotion.')->group(function() {
        Route::get('/', [PromotionController::class, 'index'])->name('index');
        Route::get('/create', [PromotionController::class, 'create'])->name('create');
        Route::get('/{id}', [PromotionController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PromotionController::class, 'edit'])->name('edit');
        Route::post('/', [PromotionController::class, 'store'])->name('store');
        Route::put('/{id}', [PromotionController::class, 'update'])->name('update');
        Route::delete('/{id}', [PromotionController::class, 'destroy'])->name('delete');
    });
});
