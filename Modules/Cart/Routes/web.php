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
        Route::get('/', 'CartController@index')->name('index');
        Route::get('/create', 'CartController@create')->name('create');
        Route::get('/{id}', 'CartController@show')->name('show');
        Route::get('/{id}/edit', 'CartController@edit')->name('edit');
        Route::post('/', 'CartController@store')->name('store');
        Route::put('/{id}', 'CartController@update')->name('update');
        Route::delete('/{id}', 'CartController@destroy')->name('delete');
    });
});
