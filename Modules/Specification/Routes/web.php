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
    Route::prefix('specifications')->name('specification.')->group(function() {
        Route::get('/', 'SpecificationController@index')->name('index');
        Route::get('/create', 'SpecificationController@create')->name('create');
        Route::get('/{id}', 'SpecificationController@show')->name('show');
        Route::get('/{id}/edit', 'SpecificationController@edit')->name('edit');
        Route::post('/', 'SpecificationController@store')->name('store');
        Route::put('/{id}', 'SpecificationController@update')->name('update');
        Route::delete('/{id}', 'SpecificationController@destroy')->name('delete');
    });
});
