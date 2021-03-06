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
	if (Auth::user()) {
		return back();
	}
	return view('auth.login');
});
// Route::post('login', 'LogController@check');
Route::get('logout', 'Auth\LoginController@logout');

Route::middleware('can:isAdmin')->group(function () {

	Route::get('dashboard', 'DashboardController@index')->name('dashboard');

	Route::prefix('category')->group(function () {
		Route::get('', 'CategoryController@index')->name('haha');
		Route::get('add', function () {
			return view('category.add');
		});
		Route::post('store', 'CategoryController@store');
		Route::get('delete/{id}', 'CategoryController@delete');
		Route::get('edit/{id}', 'CategoryController@edit');
		Route::post('update/{id}', 'CategoryController@update');
	});

	Route::prefix('item')->group(function () {
		Route::get('', 'ItemController@index');
		Route::get('show', 'ItemController@show_data');
		Route::get('add', 'ItemController@add');
		Route::post('store', 'ItemController@store');
		Route::get('edit/{id}', 'ItemController@edit');
		Route::put('update/{id}', 'ItemController@update');
		Route::get('delete/{id}', 'ItemController@delete');
	});

	Route::prefix('users')->group(function () {
		Route::get('', 'UsersController@index');
		Route::get('add', 'UsersController@add');
		Route::post('store', 'UsersController@store');
		Route::get('edit/{id}', 'UsersController@edit');
		Route::post('update/{id}', 'UsersController@update');
		Route::get('delete/{id}', 'UsersController@destroy');
	});

	Route::prefix('customer')->group(function () {
		Route::get('', 'CustomerController@index');
		Route::get('add', 'CustomerController@add');
		Route::post('store', 'CustomerController@store');
		Route::get('edit/{id}', 'CustomerController@edit');
		Route::post('update/{id}', 'CustomerController@update');
		Route::get('delete/{id}', 'CustomerController@destroy');
	});

});

Route::prefix('orders')->group(function () {
	Route::get('', 'OrdersController@index');
	Route::get('add', 'OrdersController@add');
	// Route::get('orders/add', function () {
	// 	return view('add');
	// })->where('any', '.*');
	Route::post('store', 'OrdersController@store');
	Route::get('details/{id}', 'OrdersController@details');
	Route::get('delete/{id}', 'OrdersController@delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
