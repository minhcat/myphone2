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
use Modules\Dashboard\Http\Controllers\DashboardController;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::prefix('dashboard')->name('dashboard.')->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});
