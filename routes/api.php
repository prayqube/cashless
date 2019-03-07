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


Route::group(['prefix' => '/v1', 'middleware' => ['CheckHeaders']], function(){
Route::post('app/login','Api\v1\LoginController@authenticate');


Route::get('app/event','Api\v1\EventController@eventList');
Route::post('app/register','Api\v1\UserController@create');
});

Route::group(['prefix' => '/v1', 'middleware' => ['CheckHeaders','ValidateRequest']], function(){
Route::post('app/change-password','Api\v1\LoginController@change_password');

Route::get('app/transaction/{id}','Api\v1\TransactionController@getTransaction');
Route::post('app/update-password','Api\v1\UserController@update_password');

});
