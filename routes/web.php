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

Route::get('/', [
	    'uses' =>'FoodController@index',
    'as'=> 'home'
]);
Route::get('/foods/{string}', [
	'uses' => 'FoodController@getFoodsSection',
   'as' => 'section.foods'
]);
Route::delete('emptyCart','CartController@emptyCart');
Route::resource('food','FoodController',['only'=>['index', 'show']]);
Route::resource('cart', 'CartController');
Route::group(['prefix' => 'adminfood'], function() {
	Route::get('',[
		'uses'=>'AdminFoodController@getAdminIndexFood',
		'as'=>'adminfood.index'
	]);
	Route::get('create',[
		'uses'=>'AdminFoodController@getAdminCreateFood',
		'as'=>'adminfood.create'
	]);
	Route::Post('create',[
		'uses'=>'AdminFoodController@postAdminCreateFood',
		'as'=>'adminfood.create'
	]);
});