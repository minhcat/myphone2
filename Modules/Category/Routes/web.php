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
    Route::prefix('categories')->name('category.')->group(function() {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('/create', 'CategoryController@create')->name('create');
        Route::get('/builder', 'CategoryController@builder')->name('builder');
        Route::post('/', 'CategoryController@store')->name('store');
        Route::post('/build', 'CategoryController@build')->name('build');
        Route::get('/{id}', 'CategoryController@show')->name('show');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('edit');
        Route::put('/{id}', 'CategoryController@update')->name('update');
        Route::delete('/{id}', 'CategoryController@destroy')->name('delete');
    });
});
