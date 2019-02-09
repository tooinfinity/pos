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
    Route::resource('/moderator', 'Dashboard\ModeratorController')->except([
        'show'
    ]);
    Route::resource('/category', 'Dashboard\CategoryController')->except([
        'show'
    ]);
    Route::resource('/product', 'Dashboard\ProductController')->except([
        'show'
    ]);

});

//Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
/*
Route::get('/product', 'Dashboard\ProductController@index')->name('product');
Route::get('/sale', 'Dashboard\SaleController@index')->name('sale');
Route::get('/purchase', 'Dashboard\PurchaseController@index')->name('purchase');
Route::get('/provider', 'Dashboard\ProviderController@index')->name('provider');
Route::get('/client', 'Dashboard\ClientController@index')->name('client');
Route::get('/report', 'Dashboard\ReportController@index')->name('report');
Route::get('/box', 'Dashboard\BoxController@index')->name('box');*/