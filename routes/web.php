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
//test route start


//test route end





//frontend start
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/','FrontController@index');
Route::get('get_all_category','FrontController@get_all_category')->name('get_all_category');
Route::post('cart_add','FrontController@cart_add')->name('cart_add');
Route::get('get_cart_count','FrontController@get_cart_count')->name('get_cart_count');
Route::get('get_cart_box','FrontController@get_cart_box')->name('get_cart_box');
Route::get('get_cart_data','FrontController@get_cart_data')->name('get_cart_data');
Route::get('cart_delete/{id}','FrontController@cart_delete')->name('cart_delete');
Route::get('view_cart','FrontController@view_cart')->name('view_cart');
Route::get('get_all_cart_info','FrontController@get_all_cart_info');
Route::post('cart_update','FrontController@cart_update');
Route::get('show_cart_modal/{id}','FrontController@show_cart_modal')->name('show_cart_modal');

Route::post('send_otp','FrontController@send_otp')->name('send_otp');
Route::post('submit_otp','FrontController@submit_otp')->name('submit_otp');
Route::get('logout','FrontController@logout')->name('logout');
Route::view('otp','auth.save_name');




Route::get('login', function () {
    return view('auth.register');
})->name('login');



Route::get('order_tracking', function () {
    return view('frontend.order_tracking');
});

Route::get('view_all/{type}','FrontController@view_all_product')->name('view_all');
Route::get('get_all_product_view_all/{type}','FrontController@get_all_product_view_all');
Route::get('view_all','FrontController@view_alll_category_product')->name('view_all_product');
Route::post('search_product','FrontController@search_product')->name('search_product');
Route::get('get_all_homepage_section/{type}','FrontController@get_all_homepage_section');

Route::group(['middleware' => 'IsLoggedIn'], function()
{
   Route::get('checkout','FrontController@checkout');
   Route::get('get_all_address','FrontController@get_all_address');
   Route::post('add_address','FrontController@add_address');
   Route::get('delete_address/{id}','FrontController@delete_address');
   Route::post('update_address','FrontController@update_address');
   Route::post('place_order','FrontController@place_order')->name('place_order');
   Route::get('edit_address/{id}','FrontController@edit_address');
   Route::get('order_list','FrontController@order_list');
   Route::post('view_order_details','FrontController@view_order_details')->name('view_order_details');

});


Route::group(['middleware' => 'Isuser'], function()
{
    Route::post('submit_user_information','FrontController@submit_user_information')->name('submit_user_information');
});

Route::view('admin_login','admin.auth.login');
Route::post('admin_login','AdminController@login')->name('admin_login');


Route::group(['prefix' => 'admin','middleware' => 'IsAdmin'], function()
{
    Route::get('/','AdminController@show_dashboard');

    Route::get('logout_admin','AdminController@logout')->name('logout_admin');



    //domain start
    Route::get('show-all-domain','AdminController@show_all_domain')->name('show-all-domain');
    Route::get('add-domain','AdminController@add_domain_ui')->name('add-domain');
    Route::post('add-domain','AdminController@add_domain')->name('add-domain');
    Route::get('domain_active_status_update/{id}','AdminController@domain_active_status_update');
    Route::get('edit_domain_content/{id}','AdminController@edit_domain_content_ui')->name('edit_domain_content');
    Route::post('update_domain_content','AdminController@update_domain_content')->name('update_domain_content');
    Route::get('domain_content_delete/{id}','AdminController@domain_content_delete')->name('domain_content_delete');
    Route::get('edit_domain_image/{id}','AdminController@edit_domain_image_ui')->name('edit_domain_image');
    Route::post('update_domain_image','AdminController@update_domain_image')->name('update_domain_image');

    //domain end
     //category start
     Route::get('show-all-category','AdminController@show_all_category')->name('show-all-category');
     Route::get('add-category','AdminController@add_category_ui')->name('add-category');
     Route::post('add-category','AdminController@add_category')->name('add-category');
     Route::get('category_active_status_update/{id}','AdminController@category_active_status_update');
     Route::get('edit_category_content/{id}','AdminController@edit_category_content_ui')->name('edit_category_content');
     Route::post('update_category_content','AdminController@update_category_content')->name('update_category_content');
     Route::get('category_content_delete/{id}','AdminController@category_content_delete')->name('category_content_delete');
     Route::get('edit_category_image/{id}','AdminController@edit_category_image_ui')->name('edit_category_image');
     Route::post('update_category_image','AdminController@update_category_image')->name('update_category_image');

     //category end


      //category start with domain
      Route::get('show-all-category-with_domain','AdminController@show_all_category_with_domain')->name('show-all-category-with-domain');
      Route::get('add-category-with-domain','AdminController@add_category_with_domain_ui')->name('add-category-with-domain');
      Route::post('add-category-with-domain','AdminController@add_category_with_domain')->name('add-category-with-domain');
      Route::get('category_with_domain_active_status_update/{id}','AdminController@category_with_domain_active_status_update');
      Route::get('edit_category_with_domain_content/{id}','AdminController@edit_category_with_domain_content_ui')->name('edit_category_with_domain_content');
      Route::post('update_category_with_domain_content','AdminController@update_category_with_domain_content')->name('update_category_with_domain_content');
      Route::get('category_with_domain_content_delete/{id}','AdminController@category_with_domain_content_delete')->name('category_with_domain_content_delete');
      Route::get('edit_category_with_domain_image/{id}','AdminController@edit_category_with_domain_image_ui')->name('edit_category_with_domain_image');
      Route::post('update_category_with_domain_image','AdminController@update_category_with_domain_image')->name('update_category_with_domain_image');

      //category end with domain

      //sub category start

      Route::get('show-all-sub-category','AdminController@show_all_sub_category')->name('show-all-sub-category');
      Route::get('add-sub_category','AdminController@add_sub_category_ui')->name('add-sub_category');
      Route::post('add-sub_category','AdminController@add_sub_category')->name('add-sub_category');
      Route::get('sub_category_active_status_update/{id}','AdminController@sub_category_active_status_update');
      Route::get('edit_sub_category_content/{id}','AdminController@edit_sub_category_content_ui')->name('edit_sub_category_content');
      Route::post('update_sub_category_content','AdminController@update_sub_category_content')->name('update_sub_category_content');
      Route::get('sub_category_content_delete/{id}','AdminController@sub_category_content_delete')->name('sub_category_content_delete');
      Route::get('edit_sub_category_image/{id}','AdminController@edit_sub_category_image_ui')->name('edit_sub_category_image');
      Route::post('update_sub_category_image','AdminController@update_sub_category_image')->name('update_sub_category_image');

      //sub category end

      //prodcut start
      Route::get('get_category','AdminController@get_category')->name('get_category');
      Route::post('get_sub_category','AdminController@get_sub_category')->name('get_sub_category');
      Route::post('get_brand','AdminController@get_brand')->name('get_brand');
      Route::get('show-all-product','AdminController@show_all_product')->name('show-all-product');
      Route::get('get_all_product','AdminController@get_all_product')->name('get_all_product');
      Route::get('add-product','AdminController@add_product_ui')->name('add-product');
      Route::post('add-product','AdminController@add_product')->name('add-product');
      Route::get('product_active_status_update/{id}','AdminController@product_active_status_update');
      Route::get('edit_product_content/{id}','AdminController@edit_product_content_ui')->name('edit_product_content');
      Route::post('update_product_content','AdminController@update_product_content')->name('update_product_content');
      Route::get('product_content_delete/{id}','AdminController@product_content_delete')->name('product_content_delete');
      Route::get('edit_product_image/{id}','AdminController@edit_product_image_ui')->name('edit_product_image');
      Route::post('update_product_image','AdminController@update_product_image')->name('update_product_image');
      Route::get('show-all-product-field','AdminController@show_all_product_field')->name('show-all-product-field');
      Route::get('product_required_field_active_status_update/{id}','AdminController@product_required_field_active_status_update')->name('product_required_field_active_status_update');
      Route::post('get_product_update_modal','AdminController@get_product_update_modal');
      Route::post('update_product_value','AdminController@update_product_value')->name('update_product_value');
      Route::get('product_content_delete/{id}','AdminController@product_content_delete')->name('product_content_delete');

      //product end

      //purchase start
      Route::post('add-purchase','AdminController@add_purchase')->name('add-purchase');
      Route::get('add-purchase','AdminController@add_purchase_ui')->name('add-purchase');
      Route::get('show-all-purchase','AdminController@show_all_purchase')->name('show-all-purchase');

      //purchase end

      //brand start
      Route::get('edit_brand_content/get_category','AdminController@get_category')->name('get_category');
      Route::post('edit_brand_content/get_sub_category','AdminController@get_sub_category')->name('get_sub_category');
      Route::get('show-all-brand','AdminController@show_all_brand')->name('show-all-brand');
      Route::get('add-brand','AdminController@add_brand_ui')->name('add-brand');
      Route::post('add-brand','AdminController@add_brand')->name('add-brand');
      Route::get('brand_active_status_update/{id}','AdminController@brand_active_status_update');
      Route::get('edit_brand_content/{id}','AdminController@edit_brand_content_ui')->name('edit_brand_content');
      Route::post('update_brand_content','AdminController@update_brand_content')->name('update_brand_content');
      Route::get('brand_content_delete/{id}','AdminController@brand_content_delete')->name('brand_content_delete');
      Route::get('edit_brand_image/{id}','AdminController@edit_brand_image_ui')->name('edit_brand_image');
      Route::post('update_brand_image','AdminController@update_brand_image')->name('update_brand_image');

      //brand end

      //homepgae_content_start
      Route::get('show-all-homepage_section','AdminController@show_all_homepage_section')->name('show-all-homepage_section');
      Route::get('add-homepage-section','AdminController@add_homepage_section_ui')->name('add-homepage-section');
      Route::post('add-homepage-section','AdminController@add_homepage_section')->name('add-homepage-section');
      Route::get('homepage-section_active_status_update/{id}','AdminController@homepage_section_active_status_update');
      Route::get('edit_homepage-section_content/{id}','AdminController@edit_homepage_section_content_ui')->name('edit_homepage-section_content');
      Route::post('update_homepage-section_content','AdminController@update_homepage_section_content')->name('update_homepage-section_content');
      Route::get('homepage-section_content_delete/{id}','AdminController@homepage_section_content_delete')->name('homepage-section_content_delete');
      Route::get('edit_homepage-section_image/{id}','AdminController@edit_homepage_section_image_ui')->name('edit_homepage-section_image');
      Route::post('update_homepage-section_image','AdminController@update_homepage_section_image')->name('update_homepage-section_image');
      Route::post('update_homepage_content_order','AdminController@update_homepage_content_order')->name('update_homepage_content_order');
      //homepage_content_end

      //product add to section start
        Route::get('product-add-to-section/{id}','AdminController@product_add_to_section_ui')->name('product-add-to-section');
        Route::post('add-product-to-section','AdminController@add_product_to_section')->name('add-product-to-section');
        Route::post('update-product-to-section','AdminController@update_product_to_section')->name('update-product-to-section');
        Route::get('get_all_homepage_section_product/{id}','AdminController@get_all_homepage_section_product')->name('get_all_homepage_section_product');
        Route::get('delete_product_from_section/{id}','AdminController@delete_product_from_section')->name('delete_product_from_section');
        Route::get('get_all_product_list/{id}','AdminController@get_all_product_list')->name('get_all_product_list');
    //product add to section end

    //banner start
    Route::get('show-all-banner','AdminController@show_all_banner')->name('show-all-banner');
    Route::get('add-banner','AdminController@add_banner_ui')->name('add-banner');
    Route::post('add-banner','AdminController@add_banner')->name('add-banner');
    Route::get('banner_active_status_update/{id}','AdminController@banner_active_status_update');
    Route::get('edit_banner_content/{id}','AdminController@edit_banner_content_ui')->name('edit_banner_content');
    Route::post('update_banner_content','AdminController@update_banner_content')->name('update_banner_content');
    Route::get('banner_content_delete/{id}','AdminController@banner_content_delete')->name('banner_content_delete');
    Route::get('edit_banner_image/{id}','AdminController@edit_banner_image_ui')->name('edit_banner_image');
    Route::post('update_banner_image','AdminController@update_banner_image')->name('update_banner_image');
    Route::post('update_banner_order','AdminController@update_banner_order')->name('update_banner_order');
    //banner end

    //order start

    Route::get('new-order','AdminController@new_order')->name('new-order');
    Route::get('all-order','AdminController@all_order')->name('all-order');
    Route::get('show-order-product/{order_no}','AdminController@show_order_product');

    //order end


    //All courier start

     Route::get('show-all-courier','AdminController@show_all_courier_man')->name('show-all-courier');
     Route::get('add-courier','AdminController@add_courier_man_ui');
     Route::post('add-courier','AdminController@add_courier_man')->name('add-courier');
     Route::get('courier_man_active_status/{id}','AdminController@courier_man_active_status');
     Route::get('edit_courier_content/{id}','AdminController@edit_courier_content_ui')->name('edit_courier_content');
     Route::post('update_courier_content','AdminController@update_courier_content')->name('update_courier_content');
     Route::get('courier_man_delete/{id}','AdminController@courier_man_content_delete')->name('courier_man_delete');
     Route::get('reset_courier_man_password/{id}','AdminController@reset_courier_man_password')->name('reset_courier_man_password');
     Route::post('update_password','AdminController@update_password')->name('update_password');

    //All courier end

    //All User start

    Route::get('show-all-user','AdminController@show_all_user')->name('show-all-user');
    Route::get('add-user','AdminController@add_user_ui');
    Route::post('add-user','AdminController@add_user')->name('add-user');
    Route::get('user_active_status/{id}','AdminController@user_active_status');
    Route::get('edit_user_content/{id}','AdminController@edit_user_content_ui')->name('edit_user_content');
    Route::post('update_user_content','AdminController@update_user_content')->name('update_user_content');
    Route::get('user_delete/{id}','AdminController@user_content_delete')->name('user_delete');

   //All User end

    //Warehouse start

    Route::get('show-all-warehouse','AdminController@show_all_warehouse')->name('show-all-warehouse');
    Route::get('add-warehouse','AdminController@add_warehouse_ui');
    Route::post('add-warehouse','AdminController@add_warehouse')->name('add-warehouse');
    Route::get('warehouse_product_active_status/{id}','AdminController@warehouse_product_active_status');
    Route::get('edit_warehouse_content/{id}','AdminController@edit_warehouse_content_ui')->name('edit_warehouse_content');
    Route::post('update_warehouse_content','AdminController@update_warehouse_content')->name('update_warehouse_content');
    Route::get('warehouse_content_delete/{id}','AdminController@warehouse_content_delete')->name('warehouse_content_delete');
    Route::get('warehouse_product/{id}','AdminController@warehouse_content_delete')->name('warehouse_content_delete');
    Route::post('show-warehouse-product','AdminController@show_warehouse_product')->name('show-warehouse-product');


   //Warehouse end

   //area start

   Route::get('show-all-area','AdminController@show_all_area')->name('show-all-area');
   Route::get('add-area','AdminController@add_area_ui');
   Route::post('add-area','AdminController@add_area')->name('add-area');
   Route::get('area_active_status_update/{id}','AdminController@area_active_status_update');
   Route::get('edit_area_content/{id}','AdminController@edit_area_content_ui')->name('edit_area_content');
   Route::post('update_area_content','AdminController@update_area_content')->name('update_area_content');
   Route::get('area_content_delete/{id}','AdminController@area_content_delete')->name('area_content_delete');
   Route::get('area_product/{id}','AdminController@area_content_delete')->name('area_content_delete');
   //area end

     //Expense start

     Route::get('show-all-expense','AdminController@show_all_expense')->name('show-all-expense');
     Route::get('add-expense','AdminController@add_expense_ui');
     Route::post('add-expense','AdminController@add_expense')->name('add-expense');
     Route::get('expense_active_status_update/{id}','AdminController@expense_active_status_update');
     Route::get('edit_expense_content/{id}','AdminController@edit_expense_content_ui');
     Route::post('update_expense_content','AdminController@update_expense_content')->name('update_expense_content');
     Route::get('expense_content_delete/{id}','AdminController@expense_content_delete')->name('expense_content_delete');
     Route::get('expense_product/{id}','AdminController@expense_content_delete')->name('expense_content_delete');
     //Expense End

   //Deposit start

   Route::get('show-all-deposit','AdminController@show_all_deposit')->name('show-all-deposit');
   Route::get('add-deposit','AdminController@add_deposit_ui');
   Route::post('add-deposit','AdminController@add_deposit')->name('add-deposit');
   Route::get('deposit_active_status_update/{id}','AdminController@deposit_active_status_update');
   Route::get('edit_deposit_content/{id}','AdminController@edit_deposit_content_ui');
   Route::post('update_deposit_content','AdminController@update_deposit_content')->name('update_deposit_content');
   Route::get('deposit_content_delete/{id}','AdminController@deposit_content_delete')->name('deposit_content_delete');
   Route::get('deposit_product/{id}','AdminController@deposit_content_delete')->name('deposit_content_delete');
   //Deposit End



   //role start

   Route::get('show-all-role','AdminController@show_all_role')->name('show-all-role');
   Route::get('add-role','AdminController@add_role_ui');
   Route::post('add-role','AdminController@add_role')->name('add-role');
   Route::get('role_active_status_update/{id}','AdminController@role_active_status_update');
   Route::get('edit_role_content/{id}','AdminController@edit_role_content_ui')->name('edit_role_content');
   Route::post('update_role_content','AdminController@update_role_content')->name('update_role_content');
   Route::get('role_content_delete/{id}','AdminController@role_content_delete')->name('role_content_delete');
   Route::get('role_product/{id}','AdminController@role_content_delete')->name('role_content_delete');
   Route::get('permission/{id}','AdminController@show_permission_form')->name('permission');
   Route::post('set_permission','AdminController@set_permission')->name('set_permission');

   //role end

   //company info start
   Route::get('show-all-company-info','AdminController@show_all_company_info')->name('show-all-company-info');
   Route::post('add-company-info','AdminController@add_company_info')->name('add-company-info');
   //company info end

   //terms and condition start
   Route::get('show-all-terms','AdminController@show_all_terms')->name('show-all-terms');
   Route::post('add-terms','AdminController@add_terms')->name('add-terms');
   //terms and condition end

    //delivery charge start
    Route::get('show-all-dellivery-charge','AdminController@show_all_delivery_charge')->name('show-all-delivery-charge');
    Route::post('add-delivery-charge','AdminController@add_delivery_charge')->name('add-delivery-charge');
    //delivery charge



});





Route::view('error','error');
Route::get('test','AdminController@test');
