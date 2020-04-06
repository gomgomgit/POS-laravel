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

Route::get('', function () {
	return view('auth.login');
});
// Route::post('login', 'LogController@check');
Route::get('logout', 'LogController@out');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('category', 'CategoryController@index')->name('haha');
Route::get('category/add', function () {
	return view('category.add');
});
Route::post('category/store', 'CategoryController@store');
Route::get('category/delete/{id}', 'CategoryController@delete');
Route::get('category/edit/{id}', 'CategoryController@edit');
Route::post('category/update/{id}', 'CategoryController@update');

Route::get('item', 'ItemController@index')->name('login');
Route::get('item/add', 'ItemController@add');
Route::post('item/store', 'ItemController@store');
Route::get('item/edit/{id}', 'ItemController@edit');
Route::put('item/update/{id}', 'ItemController@update');
Route::get('item/delete/{id}', 'ItemController@delete');

Route::get('users', 'UsersController@index');
Route::get('users/add', 'UsersController@add');
Route::post('users/store', 'UsersController@store');
Route::get('users/edit/{id}', 'UsersController@edit');
Route::post('users/update/{id}', 'UsersController@update');
Route::get('users/delete/{id}', 'UsersController@destroy');

Route::get('orders', 'OrdersController@index');
Route::get('orders/add', 'OrdersController@add');
// Route::get('/orders/add', function () {
// 	return view('orders/add');
// })->where('any', '.*');
Route::post('orders/store', 'OrdersController@store');
Route::get('orders/details/{id}', 'OrdersController@details');
Route::get('orders/delete/{id}', 'OrdersController@delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
