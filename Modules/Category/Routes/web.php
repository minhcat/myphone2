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
use Modules\Category\Http\Controllers\CategoryController;

Route::prefix('admin')->group(function() {
    Route::prefix('categories')->name('category.')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::get('/builder', [CategoryController::class, 'builder'])->name('builder');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::post('/build', [CategoryController::class, 'build'])->name('build');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('delete');
    });
});
