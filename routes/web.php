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

Route::middleware(['throttle:150,1'])->group(function ()
{
    Route::middleware(['check_admin','load_admin_data'])->group(function ()
    {
        Route::get('admin','admin\AdminController@index');
        Route::resource('admin/product','admin\ProductController',['except'=>['show']]);
        Route::resource('admin/category','admin\CategoryController',['except'=>['show']]);
        Route::resource('admin/order/discount','admin\DiscountController',['except'=>['show']]);
        Route::resource('admin/order/gift_cart','admin\GiftCartController',['except'=>['show']]);
        Route::post('admin/category/del_img/{id}','admin\CategoryController@del_img');
        Route::resource('admin/slider','admin\SliderController',['except'=>['show']]);
        Route::get('admin/product/gallery','admin\ProductController@gallery');
        Route::post('admin/product/upload','admin\ProductController@upload');
        Route::post('admin/product/del_product_img/{id}','admin\ProductController@del_product_img');
        Route::get('admin/filter','admin\FilterController@index');
        Route::post('admin/filter','admin\FilterController@create');
        Route::get('admin/item','admin\ItemController@index');
        Route::post('admin/item','admin\ItemController@create');
        Route::get('admin/product/add-item/{id}','admin\ProductController@add_item_form');
        Route::post('admin/product/add_item','admin\ProductController@add_item_product');
        Route::resource('admin/amazing','admin\AmazingController',['except'=>['show']]);
        Route::resource('admin/service','admin\ServiceController');
        Route::post('admin/service/get_price','admin\ServiceController@get_price');
        Route::post('admin/service/set_price','admin\ServiceController@set_price');
        Route::get('admin/product/add-review','admin\ProductController@add_review_form');
        Route::post('admin/product/add_review','admin\ProductController@add_review');
        Route::post('admin/product/del_review_img/{id}','admin\ProductController@del_review_img');
        Route::resource('admin/ostan','admin\OstanController',['except'=>['show']]);
        Route::resource('admin/shahr','admin\ShahrController',['except'=>['show']]);
        Route::get('admin/order','admin\OrderController@index');
        Route::get('admin/order/{id}','admin\OrderController@view');
        Route::delete('admin/order/{id}','admin\OrderController@destroy');
        Route::post('admin/order/set_status','admin\OrderController@set_status');
        Route::resource('admin/user','admin\UserController');
        Route::get('admin/product/add-filter/{id}','admin\ProductController@add_filter_form');
        Route::post('admin/product/add_filter','admin\ProductController@add_filter_product');
        Route::get('admin/statistics','admin\AdminController@statistics');
        Route::get('admin/comment','admin\CommentController@index');
        Route::post('admin/ajax/set_comment_status','admin\CommentController@set_comment_status');
        Route::delete('admin/comment/{id}','admin\CommentController@delete');
        Route::get('admin/question','admin\QuestionController@index');
        Route::post('admin/ajax/set_status_question','admin\QuestionController@set_status');
        Route::delete('admin/question/{id}','admin\QuestionController@delete');
        Route::post('admin/question/add','admin\QuestionController@add');
        Route::get('admin/setting/pay','admin\AdminController@pay_setting_form');
        Route::post('admin/setting/pay','admin\AdminController@pay_setting');

    });

    Route::get('admin_login','admin\AdminController@admin_login');

    Route::middleware(['statistics'])->group(function ()
    {
        Route::get('/','SiteController@index');
        Route::get('product/{code}/{title}','SiteController@show');
        Route::get('Cart','SiteController@show_cart');

        Route::get('category/{cat1}','SearchController@cat1');
        Route::get('search/{cat1}/{cat2}/{cat3}','SearchController@search');


        Route::get('Compare/{product1}','SiteController@compare');
        Route::get('Compare/{product1}/{product2}','SiteController@compare');
        Route::get('Compare/{product1}/{product2}/{product3}','SiteController@compare');
        Route::get('Compare/{product1}/{product2}/{product3}/{product4}','SiteController@compare');

        Route::get('Search','SiteController@search');

    });

    Route::post('site/ajax_set_service','SiteController@set_service');
    Route::post('Cart','SiteController@cart');

    Route::post('ajax_get_compare_product','SiteController@get_compare_product');
    Route::post('site/ajax_del_cart','SiteController@del_cart');
    Route::post('site/ajax_change_cart','SiteController@change_cart');
    Route::post('site/ajax_check_login','SiteController@check_login');
    Route::post('shop/get_ajax_shahr','ShopController@get_ajax_shahr');
    Route::post('shop/add_address','ShopController@add_address');
    Route::post('shop/edit_address_form','ShopController@edit_address_form');
    Route::post('shop/edit_address/{address_id}','ShopController@edit_address');
    Route::delete('remove_address/{id}','ShopController@remove_address');
    Route::match(['get','post'],'review','ShopController@review');
    Route::get('Payment','ShopController@Payment');
    Route::post('Payment','ShopController@Pay');
    Route::get('user/order','UserController@show_order');

    Route::get('Shipping','ShopController@Shipping');
    Auth::routes();
    Route::get('Captcha',function ()
    {
        $Captcha=new \App\lib\Captcha();
        $Captcha->create();
    });

    Route::middleware(['auth'])->group(function ()
    {
        Route::get('AddComment/{product_id}','SiteController@comment_form');
        Route::post('site/add_score','SiteController@add_score');
        Route::post('site/add_comment','SiteController@add_comment');
        Route::post('add_question','SiteController@add_question');
        Route::get('user','UserController@index');
        Route::get('user/orders','UserController@orders');
        Route::post('site/check_gift_cart','SiteController@check_gift_cart');
        Route::get('user/gift_cart','UserController@gift_cart');
    });

    Route::get('user/order/print','UserController@print_order');
    Route::get('user/order/create_barcode','UserController@create_barcode');
    Route::get('user/order/pdf','UserController@create_pdf');
    Route::post('order','ShopController@update_order');
    Route::get('order','ShopController@update_order2');

    Route::post('ajax/set_filter_product','SearchController@ajax_search');
    Route::post('site/check_discount_code','SiteController@check_discount_code');

    Route::post('site/ajax_get_tab_data','SiteController@get_tab_data');

    Route::get('category/{cat1}/{cat2}','SearchController@show_cat1');
    Route::get('category/{cat1}/{cat2}/{cat3}','SearchController@show_cat_product');
    Route::get('category/{cat1}/{cat2}/{cat3}/{cat4}','SearchController@show_cat4');

    Route::get('/home', 'HomeController@index')->name('home');



});
Route::get('test',function (){

    Session::forget('gift_list');

});