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
    Route::prefix('products')->group(function() {
        Route::get('/', 'ProductController@index')->name('product.index');
        Route::get('/create', 'ProductController@create')->name('product.create');
        Route::get('/{id}', 'ProductController@show')->name('product.show');
        Route::get('/{id}/edit', 'ProductController@edit')->name('product.edit');
        Route::post('/store', 'ProductController@store')->name('product.store');
    });
});
