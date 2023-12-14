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
        Route::prefix('/{specification_id}/informations')->name('information.')->group(function() {
            Route::get('/', 'InformationController@index')->name('index');
            Route::get('/create', 'InformationController@create')->name('create');
            Route::get('/{id}', 'InformationController@show')->name('show');
            Route::get('/{id}/edit', 'InformationController@edit')->name('edit');
            Route::post('/', 'InformationController@store')->name('store');
            Route::put('/{id}', 'InformationController@update')->name('update');
            Route::delete('/{id}', 'InformationController@destroy')->name('delete');
        });

        Route::get('/', 'SpecificationController@index')->name('index');
        Route::get('/create', 'SpecificationController@create')->name('create');
        Route::get('/{id}', 'SpecificationController@show')->name('show');
        Route::get('/{id}/edit', 'SpecificationController@edit')->name('edit');
        Route::post('/', 'SpecificationController@store')->name('store');
        Route::put('/{id}', 'SpecificationController@update')->name('update');
        Route::delete('/{id}', 'SpecificationController@destroy')->name('delete');
    });
});
