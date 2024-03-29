<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

 
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');

Route::resource('testings', 'TestingsController');


Route::resource('productmasters', 'ProductmastersController');

Route::resource('customermasters', 'CustomermastersController');

Route::resource('suppliermasters', 'SuppliermastersController');

Route::resource('sales', 'SalesController');

Route::resource('saledetails', 'SaledetailsController');

Route::resource('stocks', 'StocksController');

Route::resource('salereturns', 'SalereturnsController');

Route::resource('salereturndetails', 'SalereturndetailsController');

Route::resource('purchasereturns', 'PurchasereturnsController');

Route::resource('purchasereturndetails', 'PurchasereturndetailsController');

Route::resource('purchases', 'PurchasesController');

Route::resource('purchasedetails', 'PurchasedetailsController');