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
use Modules\DiscountForm\Http\Controllers\DiscountFormController;

Route::prefix('admin')->group(function() {
    Route::prefix('discount-forms')->name('discount_form.')->group(function() {
        Route::get('/', [DiscountFormController::class, 'index'])->name('index');
        Route::get('/create', [DiscountFormController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [DiscountFormController::class, 'edit'])->name('edit');
        Route::get('/{id}', [DiscountFormController::class, 'show'])->name('show');
        Route::post('/', [DiscountFormController::class, 'store'])->name('store');
        Route::put('/{id}', [DiscountFormController::class, 'update'])->name('update');
        Route::delete('/{id}', [DiscountFormController::class, 'destroy'])->name('delete');
    });
});
