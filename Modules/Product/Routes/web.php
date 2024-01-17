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
    Route::prefix('products')->name('product.')->group(function() {
        Route::prefix('/{product_id}/variations')->name('variation.')->group(function() {
            Route::get('/', 'VariationController@index')->name('index');
            Route::get('/create', 'VariationController@create')->name('create');
            Route::get('/{id}', 'VariationController@show')->name('show');
            Route::get('/{id}/edit', 'VariationController@edit')->name('edit');
            Route::post('/', 'VariationController@store')->name('store');
            Route::put('/{id}', 'VariationController@update')->name('update');
            Route::delete('/{id}', 'VariationController@destroy')->name('delete');
        });

        Route::prefix('{product_id}/details')->name('detail.')->group(function() {
            Route::get('/', 'DetailController@index')->name('index');
            Route::get('/edit', 'DetailController@edit')->name('edit');
            Route::post('/', 'DetailController@update')->name('update');
            Route::delete('/{id}', 'DetailController@destroy')->name('delete');
        });

        Route::get('/', 'ProductController@index')->name('index');
        Route::get('/create', 'ProductController@create')->name('create');
        Route::get('/{id}', 'ProductController@show')->name('show');
        Route::get('/{id}/edit', 'ProductController@edit')->name('edit');
        Route::post('/', 'ProductController@store')->name('store');
        Route::put('/{id}', 'ProductController@update')->name('update');
        Route::delete('/{id}', 'ProductController@destroy')->name('delete');
    });
});
