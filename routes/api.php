<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['json.response'],'middleware' => ['auth:api']], function ()  {

       Route::post('get_area','AndroidController@get_area');
       Route::post('save_address','AndroidController@save_address');
       Route::post('get_address','AndroidController@get_address');
       Route::post('delete_address','AndroidController@delete_address');
        Route::post('user_order','AndroidController@get_order_details');

        Route::post('submit_order','AndroidController@submit_order');
          Route::post('logout','AndroidController@logout');
          Route::post('order_delivered','AndroidController@order_delivered');
        Route::post('token_insertion','AndroidController@token_insertion');
        Route::post('delivery_fee','AndroidController@delivery_fee');
        Route::post('remarks','AndroidController@remarks');



});

Route::group(['middleware' => ['json.response']], function () {
        Route::post('login','AndroidController@login');
        Route::post('registration','AndroidController@registration');
        Route::post('submit_otp','AndroidController@submit_otp');
         Route::post('get_homepage_content','AndroidController@get_homepage_content');
       Route::post('get_category','AndroidController@get_category');

       Route::post('get_search_result','AndroidController@search_product');

       //deliveryman_start
         Route::post('delivery_man_login','AndroidController@delivery_man_login');
         Route::post('delivery_man_registration','AndroidController@delivery_man_registration');
         //deliveryman_end



});
Route::post('send_otp','AndroidController@send_otp');
//test api
Route::post('get_date','AndroidController@date_test');
Route::post('search_courier_man','AndroidController@search_courier_man');

//test api

Route::post('login_delivery_man','AndroidController@login_delivery_man');
Route::group(['middleware' => ['json.response'],'middleware' => ['auth:api']], function ()  {
    Route::post('todays_order','AndroidController@todays_order');
     Route::post('all_order','AndroidController@all_order');
     Route::post('order_picked','AndroidController@order_picked');
     Route::post('delivery_man_dashboard','AndroidController@delivery_man_dashboard');
      Route::post('wallet','AndroidController@check_deposit');
       Route::post('order_details','AndroidController@order_details');
        Route::post('update_area','AndroidController@update_area');
         Route::post('get_selected_area','AndroidController@get_selected_area');
    Route::post('get_area_delivery_man','AndroidController@get_area_delivery_man');





});


