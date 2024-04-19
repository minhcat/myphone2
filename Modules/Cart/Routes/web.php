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

Route::prefix('admin')->group(function() {
    Route::prefix('carts')->name('cart.')->group(function() {
        Route::prefix('/{cart_id}/details')->name('detail.')->group(function() {
            Route::get('/', 'CartDetailController@index')->name('index');
            Route::get('/create', 'CartDetailController@create')->name('create');
            Route::get('/{id}', 'CartDetailController@show')->name('show');
            Route::get('/{id}/edit', 'CartDetailController@edit')->name('edit');
            Route::post('/', 'CartDetailController@store')->name('store');
            Route::put('/{id}', 'CartDetailController@update')->name('update');
            Route::delete('/{id}', 'CartDetailController@destroy')->name('delete');
        });

        Route::get('/', 'CartController@index')->name('index');
        Route::get('/{id}', 'CartController@show')->name('show');
    });
});
