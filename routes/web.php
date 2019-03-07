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



Auth::routes();

	Route::get('/index' ,'Auth\LoginController@index');
	Route::get('/' ,'Auth\LoginController@index');
	Route::get('/logout' ,'Auth\LoginController@logout');

	Route::post('/validate' ,'Auth\LoginController@validateUser');
	Route::get('/home' ,'HomeController@index');

	Route::get('/event' ,'EventController@index');
	Route::get('/event-create' ,'EventController@create');
	Route::post('/event-store' ,'EventController@store');
	Route::get('/event/edit/{id}', 'EventController@edit');
	Route::get('/event/view/{id}', 'EventController@view');
	Route::post('/event-update' ,'EventController@update');
	Route::get('/event/delete/{id}', 'EventController@delete');
	Route::get('/event/deleteImage/{id}', 'EventController@deleteImage');


	Route::get('/eventcategories' ,'EventCategoryController@index');
	Route::get('/eventcategories/add' ,'EventCategoryController@create');
	Route::post('/eventcategories/add' ,'EventCategoryController@store');
	Route::get('/eventcategories/edit/{id}', 'EventCategoryController@show');
	Route::post('/eventcategories/edit/{id}', 'EventCategoryController@update');
	Route::get('/eventcategories/del/{id}', 'EventCategoryController@delete');



	Route::get('/eventitem' ,'EventItemsController@index');
	Route::get('/eventitems/add' ,'EventItemsController@create');
	Route::post('/eventitems/add' ,'EventItemsController@store');
	Route::get('/eventitems/edit/{id}', 'EventItemsController@show');
	Route::post('/eventitems/edit', 'EventItemsController@update');
	Route::get('/eventitems/delete/{id}', 'EventItemsController@delete');

	Route::get('/vendors' ,'VendorsController@index');
	Route::get('/vendors/add' ,'VendorsController@create');
	Route::post('/vendors/add' ,'VendorsController@store');
	Route::get('/vendors/view/{id}', 'VendorsController@show');
	Route::get('/vendors/update/{id}', 'VendorsController@show');

	Route::post('/vendors/update/{id}', 'VendorsController@update');
	Route::post('/vendors/upload/{id}', 'VendorsController@uploadFile');

	Route::get('/vendors/approve/{id}', 'VendorsController@approve');
	Route::get('/vendors/delete/{id}', 'VendorsController@delete');

	Route::get('/suppliers' ,'SupplierController@index');
	Route::get('/suppliers/add' ,'SupplierController@create');
	Route::post('/suppliers/add' ,'SupplierController@store');
	Route::get('/suppliers/view/{id}', 'SupplierController@show');
	Route::get('/suppliers/update/{id}', 'SupplierController@show');

	Route::post('/suppliers/update/{id}', 'SupplierController@update');
	Route::post('/suppliers/upload/{id}', 'SupplierController@uploadFile');

	Route::get('/suppliers/approve/{id}', 'SupplierController@approve');
	Route::get('/suppliers/delete/{id}', 'SupplierController@delete');

	route::get('/transaction/','TransactionController@index');
	route::post('/transaction/search','TransactionController@search');

Route::post('transaction/export', 'TransactionController@export');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    return "Cache is cleared";
});
