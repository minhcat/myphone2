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
    Route::prefix('attributes')->name('attribute.')->group(function() {
        Route::prefix('/{attribute_id}/options')->name('option.')->group(function() {
            Route::get('/', 'OptionController@index')->name('index');
            Route::get('/create', 'OptionController@create')->name('create');
            Route::get('/{id}', 'OptionController@show')->name('show');
            Route::get('/{id}/edit', 'OptionController@edit')->name('edit');
            Route::post('/', 'OptionController@store')->name('store');
            Route::put('/{id}', 'OptionController@update')->name('update');
            Route::delete('/{id}', 'OptionController@destroy')->name('delete');
        });

        Route::get('/', 'AttributeController@index')->name('index');
        Route::get('/create', 'AttributeController@create')->name('create');
        Route::get('/{id}', 'AttributeController@show')->name('show');
        Route::get('/{id}/edit', 'AttributeController@edit')->name('edit');
        Route::post('/', 'AttributeController@store')->name('store');
        Route::put('/{id}', 'AttributeController@update')->name('update');
        Route::delete('/{id}', 'AttributeController@destroy')->name('delete');
    });
});
