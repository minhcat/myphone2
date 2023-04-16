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

Route::prefix('admin')->name('product.')->group(function() {
    Route::prefix('products')->group(function() {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::get('/{id}', 'ProductController@show')->name('show');
        Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
        Route::post('/', 'ProductController@store')->name('store');
        Route::put('/{id}', 'ProductController@update')->name('update');
        Route::delete('/{id}', 'ProductController@destroy')->name('delete');
    });
});
