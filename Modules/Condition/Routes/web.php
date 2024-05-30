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
use Modules\Condition\Http\Controllers\ConditionController;

Route::prefix('admin')->group(function() {
    Route::prefix('conditions')->name('condition.')->group(function() {
        Route::get('/', [ConditionController::class, 'index'])->name('index');
        Route::get('/create', [ConditionController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [ConditionController::class, 'edit'])->name('edit');
        Route::get('/{id}', [ConditionController::class, 'show'])->name('show');
        Route::post('/', [ConditionController::class, 'store'])->name('store');
        Route::put('/{id}', [ConditionController::class, 'update'])->name('update');
        Route::delete('/{id}', [ConditionController::class, 'destroy'])->name('delete');
    });
});
