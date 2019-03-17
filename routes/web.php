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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name(
        'dashboard'
    );
    Route::get('dashboard/pos', 'Dashboard\DashboardController@pos')->name(
        'pos'
    );
    Route::resource('/moderator', 'Dashboard\ModeratorController')->except([
        'show'
    ]);
    Route::resource('/category', 'Dashboard\CategoryController')->except([
        'show'
    ]);
    Route::resource('/product', 'Dashboard\ProductController')->except([
        'show'
    ]);
    Route::resource('/client', 'Dashboard\ClientController')->except([
        'show'
    ]);
    Route::resource('/provider', 'Dashboard\ProviderController')->except([
        'show'
    ]);
});