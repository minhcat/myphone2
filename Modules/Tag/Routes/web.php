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
    Route::prefix('tags')->name('tag.')->group(function() {
        Route::get('/', 'TagController@index')->name('index');
        Route::get('/create', 'TagController@create')->name('create');
        Route::get('/{id}', 'TagController@show')->name('show');
        Route::get('/{id}/edit', 'TagController@edit')->name('edit');
        Route::post('/', 'TagController@store')->name('store');
        Route::put('/{id}', 'TagController@update')->name('update');
        Route::delete('/{id}', 'TagController@destroy')->name('delete');
    });
});
