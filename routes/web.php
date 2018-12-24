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

/**
 * Show orders list
 */
Route::get('order/list', 'OrderController@list');
Route::get('order/one', 'OrderController@one');
Route::get('weather/show', 'WeatherController@show');