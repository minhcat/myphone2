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
    Route::prefix('brands')->name('brand.')->group(function() {
        Route::get('/', 'BrandController@index')->name('index');
        Route::get('/create', 'BrandController@create')->name('create');
        Route::post('/', 'BrandController@store')->name('store');
        Route::get('/{id}', 'BrandController@show')->name('show');
        Route::get('/{id}/edit', 'BrandController@edit')->name('edit');
        Route::delete('/{id}', 'BrandController@destroy')->name('delete');
    });
});
