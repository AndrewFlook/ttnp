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

Route::get('/', 'HomeController@index')->name('home');
Route::middleware('auth')->group(function () {
	Route::namespace('Admin')->name('admin.')->group(function() {
		Route::get('/admin', 'DashboardController@index')->name('dashboard');
		Route::name('dashboard.')->group(function () {
			Route::get('/admin/info', 'DashboardController@info')->name('info');
			Route::post('/admin/info', 'DashboardController@postInfo')->name('postInfo');
			Route::post('/admin/hours', 'DashboardController@postHours')->name('hours');
		});
		Route::namespace('Menu')->name('menu.')->group(function () {
			Route::get('/admin/menu', 'CategoryController@get')->name('menu');
			Route::name('cat.')->group(function () {
				Route::get('/admin/menu/cat', 'CategoryController@get')->name('get');
				Route::post('/admin/menu/cat', 'CategoryController@post')->name('post');
				Route::delete('/admin/menu/cat', 'CategoryController@delete')->name('delete');
			});
			Route::name('item.')->group(function () {
				Route::get('/admin/menu/item/{item}', 'ItemController@edit')->name('edit');
				Route::post('/admin/menu/item', 'ItemController@post')->name('post');
				Route::delete('/admin/menu/item', 'ItemController@delete')->name('delitem');
			});
			Route::name('price.')->group(function () {
				Route::post('/admin/menu/item/create', 'PriceController@post')->name('create');
				Route::delete('/admin/menu/item', 'PriceController@delete')->name('delete');
			});
		});
	});
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});
Auth::routes();
