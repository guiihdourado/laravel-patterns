<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('users', 'UserController');
Route::resource('products', 'ProductController');
Route::resource('sale_orders', 'SaleOrderController');
Route::patch('sale_orders/{id}/status', 'SaleOrderStatusController@update');

