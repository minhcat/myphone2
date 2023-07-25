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

Route::prefix('admin')->name('example.')->group(function() {
    Route::prefix('examples')->group(function() {
        Route::get('/', 'ExampleController@index')->name('index');
        Route::get('/create', 'ExampleController@create')->name('create');
        Route::get('/{id}', 'ExampleController@show')->name('show');
        Route::get('/{id}/edit', 'ExampleController@edit')->name('edit');
        Route::post('/', 'ExampleController@store')->name('store');
        Route::put('/{id}', 'ExampleController@update')->name('update');
        Route::delete('/{id}', 'ExampleController@destroy')->name('delete');
    });
});