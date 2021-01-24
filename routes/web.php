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

// Route::get('/', function () {
//     echo "<h1>Start .............   Hello Bangladesh</h1>";
// });



/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here contains All Home Routes File
|
*/

Route::get('/', 'HomeController@index')->name('home');;





/*
|--------------------------------------------------------------------------
| Admin Routes   **********************************************************
|--------------------------------------------------------------------------
|
| Here contains All Seller Routes File
|
*/

Route::group(['prefix'=>'admins','as'=>'admin.'], function(){

    Route::get('/login', ['as' => 'login', 'uses' => 'AdminController@login'])->name('admin_login');
    
    Route::post('/login/post', ['as' => 'login', 'uses' => 'AdminController@login_post'])->name('admin_login_post');

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard'])->name('admin_dashboard');



    Route::get('/forgotten', ['as' => 'forgotten', 'uses' => 'AdminController@forgotten_password'])->name('admin_forgotten_password');

    Route::post('/send/otp', ['as' => 'otp', 'uses' => 'AdminController@send_otp'])->name('admin_send_otp');

    Route::get('/send/otp', ['as' => 'send_otp', 'uses' => 'AdminController@otp_updata'])->name('admin_otp');

    Route::post('/otp/check', ['as' => 'otp_check', 'uses' => 'AdminController@otp_check'])->name('admin_otp_check');

    Route::get('/password/reset', ['as' => 'pass_reset', 'uses' => 'AdminController@password_reset'])->name('admin_reset_pass');

    Route::post('/password/newpassword', ['as' => 'newpassword', 'uses' => 'AdminController@new_password'])->name('admin_new_pass');



    // Seller Settings Route    **********************

    Route::get('/seller/create', ['as' => 'seller_create', 'uses' => 'AdminController@create'])->name('admin_seller_create');

    Route::post('/seller/create/store', ['as' => 'seller_create_store', 'uses' => 'AdminController@store'])->name('admin_seller_create_store');
   
    Route::get('/sellers', ['as' => 'seller_all', 'uses' => 'AdminController@all'])->name('admin_seller_all');
    
    Route::get('/seller/edit/{id}', ['as' => 'seller_edit', 'uses' => 'AdminController@edit'])->name('admin_seller_edit');
    
    Route::post('/seller/update/{id}', ['as' => 'seller_update', 'uses' => 'AdminController@update'])->name('admin_seller_update');

    Route::get('/seller/view/{id}', ['as' => 'seller_view', 'uses' => 'AdminController@show'])->name('admin_seller_show');
    
    Route::get('/seller/delete/{id}', ['as' => 'seller_destroy', 'uses' => 'AdminController@destroy'])->name('admin_seller_destroy');


    
    // Admin Settings Route    **********************
    Route::get('/settings', ['as' => 'admin_settings', 'uses' => 'AdminController@admin_settings'])->name('admin_settings');
  
    Route::post('/settings/info', ['as' => 'admin_info', 'uses' => 'AdminController@info'])->name('admin_settings_info');
   
    Route::post('/settings/change_pass', ['as' => 'admin_change_pass', 'uses' => 'AdminController@change_pass'])->name('admin_change_pass');
    
    Route::post('/settings/change_phone', ['as' => 'admin_change_phone', 'uses' => 'AdminController@change_phone'])->name('admin_change_phone');

    Route::get('/logout', ['as' => 'admin_logout', 'uses' => 'AdminController@logout'])->name('admin_logout');




    

});









/*
|--------------------------------------------------------------------------
| Seller Routes   *********************************************************
|--------------------------------------------------------------------------
|
| Here contains All Seller Routes File 
|
*/

Route::group(['prefix'=>'sellers','as'=>'seller.'], function(){


    Route::get('/login', ['as' => 'login', 'uses' => 'SellerController@login'])->name('seller_login');

    Route::post('/login/post', ['as' => 'login', 'uses' => 'SellerController@login_post'])->name('seller_login_post');
   
    Route::get('/forgotten', ['as' => 'forgotten', 'uses' => 'SellerController@forgotten_password'])->name('seller_forgotten_password');
   
    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'SellerController@dashboard'])->name('seller_dashboard');
   
    Route::post('/send/otp', ['as' => 'otp', 'uses' => 'SellerController@send_otp'])->name('seller_send_otp');

    Route::get('/send/otp', ['as' => 'send_otp', 'uses' => 'SellerController@otp_updata'])->name('seller_otp');

    Route::post('/otp/check', ['as' => 'otp_check', 'uses' => 'SellerController@otp_check'])->name('seller_otp_check');

    Route::get('/password/reset', ['as' => 'pass_reset', 'uses' => 'SellerController@password_reset'])->name('seller_reset_pass');

    Route::post('/password/newpassword', ['as' => 'newpassword', 'uses' => 'SellerController@new_password'])->name('seller_new_pass');



    // Customer Settings Route    **********************

    Route::get('/customer/create', ['as' => 'customer_create', 'uses' => 'SellerController@create'])->name('seller_seller_create');

    Route::post('/customer/create/store', ['as' => 'customer_create_store', 'uses' => 'SellerController@store'])->name('seller_seller_create_store');
   
    Route::get('/customers', ['as' => 'customer_all', 'uses' => 'SellerController@all'])->name('seller_seller_all');
    
    Route::get('/customer/edit/{id}', ['as' => 'customer_edit', 'uses' => 'SellerController@edit'])->name('seller_seller_edit');
    
    Route::post('/customer/update/{id}', ['as' => 'customer_update', 'uses' => 'SellerController@update'])->name('seller_seller_update');

    Route::get('/customer/view/{id}', ['as' => 'customer_view', 'uses' => 'SellerController@show'])->name('seller_seller_show');
    
    Route::get('/customer/delete/{id}', ['as' => 'customer_destroy', 'uses' => 'SellerController@destroy'])->name('seller_seller_destroy');


    // Seller  Settings Route    **********************

    Route::get('/settings', ['as' => 'seller_settings', 'uses' => 'SellerController@seller_settings'])->name('seller_settings');
    
    Route::post('/settings/info', ['as' => 'seller_info', 'uses' => 'SellerController@info'])->name('seller_settings_info');

    Route::post('/settings/change_pass', ['as' => 'seller_change_pass', 'uses' => 'SellerController@change_pass'])->name('seller_change_pass');
    
    Route::post('/settings/change_phone', ['as' => 'seller_change_phone', 'uses' => 'SellerController@change_phone'])->name('seller_change_phone');

    Route::get('/logout', ['as' => 'seller_logout', 'uses' => 'SellerController@logout'])->name('seller_logout');





});
