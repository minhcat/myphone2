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
use Modules\User\Http\Controllers\AddressController;
use Modules\User\Http\Controllers\UserController;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::prefix('users')->name('user.')->group(function() {
        Route::prefix('{user_id}/addresses')->name('address.')->group(function() {
            Route::get('/', [AddressController::class, 'index'])->name('index');
            Route::get('/create', [AddressController::class, 'create'])->name('create');
            Route::get('/{id}', [AddressController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [AddressController::class, 'edit'])->name('edit');
            Route::post('/', [AddressController::class, 'store'])->name('store');
            Route::put('/{id}', [AddressController::class, 'update'])->name('update');
            Route::delete('/{id}', [AddressController::class, 'destroy'])->name('delete');
        });
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
    });
});
