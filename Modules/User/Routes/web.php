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

Route::prefix('admin')->name('user.')->group(function() {
    Route::prefix('users')->group(function() {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('/create', 'UserController@create')->name('create');
        Route::get('/{id}', 'UserController@show')->name('show');
        Route::get('/{id}/edit', 'UserController@edit')->name('edit');
        Route::post('/', 'UserController@store')->name('store');
        Route::put('/{id}', 'UserController@update')->name('update');
        Route::delete('/{id}', 'UserController@destroy')->name('delete');
    });
});
