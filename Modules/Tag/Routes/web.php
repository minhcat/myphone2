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
use Modules\Tag\Http\Controllers\TagController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('tags')->name('tag.')->group(function() {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::get('/{id}', [TagController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('delete');
    });
});
