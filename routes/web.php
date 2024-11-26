<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('admin');
});

Route::get('/admin', function () {
    if (session()->get('auth_role') === null) {
        return redirect()->route('admin.login.get_role');
    }
    $theme = get_admin_active_theme();
    return view(get_admin_theme_extend($theme, 'master'));
})->name('admin')->middleware('auth');
