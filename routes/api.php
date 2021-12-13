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

Route::middleware('auth:api')->get('/user', function (Request $request) {

     return $request->user();
});

Route::get('get_android_slider','AndroidController@get_android_slider');
Route::get('get_android_cat_index','AndroidController@get_android_cat_index');
Route::get('get_android_order_product','AndroidController@get_android_order_product');
Route::get('get_android_new_product','AndroidController@get_android_new_product');
Route::get('get_android_view_product','AndroidController@get_android_view_product');
Route::get('get_android_amazing_product','AndroidController@get_android_amazing_product');
Route::get('get_android_product_data/{id}','AndroidController@get_android_product_data');
Route::get('get_android_product_score/{id}','AndroidController@get_android_product_score');
Route::get('get_like_product/{id}','AndroidController@get_like_product');
Route::get('get_android_child_cat1/{cat_id}','AndroidController@get_android_child_cat1');
Route::get('get_android_child_cat2/{cat_id}','AndroidController@get_android_child_cat2');
Route::get('get_android_offer_product/{cat_id}','AndroidController@get_android_offer_product');
Route::get('get_android_product_filter/{cat1_id}/{cat2_id}/{cat3_id}','AndroidController@get_android_product_filter');
Route::get('get_android_product_cat/{cat_id}','AndroidController@get_android_product_cat');
Route::any('get_android_filter_product','AndroidController@get_android_filter_product');
Route::post('android_user_register','AndroidController@android_user_register');
Route::middleware('auth:api')->get('get_android_user_address','AndroidController@get_android_user_address');
Route::post('check_discount','AndroidController@check_discount');
Route::middleware('auth:api')->post('add_order','AndroidController@add_order');

Route::get('get_ostan','AndroidController@get_ostan');
Route::get('get_shahr/{ostan_id}','AndroidController@get_shahr');

Route::middleware('auth:api')->post('add_address','AndroidController@add_address');
Route::get('get_product_item/{product_id}','AndroidController@get_product_item');
Route::get('getCommentProduct/{product_id}','AndroidController@getCommentProduct');