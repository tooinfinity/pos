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
    return view('welcome');
});

Auth::routes();


Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');
Route::get('/category',  'Category\CategoryController@index')->name('category');
Route::get('/product', 'Product\ProductController@index')->name('product');
Route::get('/sale', 'Sale\SaleController@index')->name('sale');
Route::get('/purchase', 'Purchase\PurchaseController@index')->name('purchase');
Route::get('/provider', 'Provider\ProviderController@index')->name('provider');
Route::get('/client', 'Client\ClientController@index')->name('client');
Route::get('/report', 'Report\ReportController@index')->name('report');
Route::get('/box', 'Box\BoxController@index')->name('box');
Route::get('/moderator', 'Moderator\ModeratorController@index')->name('moderator');




Route::get('/home', 'HomeController@index')->name('home');

