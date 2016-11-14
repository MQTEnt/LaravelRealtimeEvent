<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('checkDB', function(){
	return DB::connection()->getDatabaseName();
});
Route::get('checkView', function(){
	return view('admin.cate');
});
//Categories
Route::get('cate', ['as' => 'cate.index', 'uses' => 'CatesController@index']);
Route::post('cate',['as' => 'cate.store', 'uses' => 'CatesController@store']);
Route::get('cate/{id}/edit', ['as' => 'cate.edit', 'uses' => 'CatesController@edit']);
Route::post('cate/{id}', ['as' => 'cate.update', 'uses' => 'CatesController@update']);
Route::get('cate/{id}', ['as' => 'cate.destroy', 'uses' => 'CatesController@destroy']);
//Products (SPA: AngularJS)
Route::get('product', ['as' => 'product.index', 'uses' => 'ProductsController@index']);
Route::post('product', ['as' => 'product.store', 'uses' => 'ProductsController@store']);
Route::get('product/data', ['as' => 'product.getData', 'uses' => 'ProductsController@getData']);
Route::get('product/{id}/edit', ['as' => 'product.edit', 'uses' => 'ProductsController@edit']);
Route::post('product/{id}', ['as' => 'product.update', 'uses' => 'ProductsController@update']);
//...Delete Product
//Dashboard
Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);
Route::get('dashboard/update', ['as' => 'dashboard.update', 'uses' => 'DashboardController@update']);
Route::get('dashboard/{id}', ['as' => 'dashboard.destroy', 'uses' => 'DashboardController@destroy']);
//Notification
Route::get('noti/data', ['as' => 'noti.getData', 'uses' => 'NotificationController@getData']);
