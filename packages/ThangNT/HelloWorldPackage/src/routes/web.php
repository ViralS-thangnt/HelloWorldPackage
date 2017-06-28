<?php

use Illuminate\Support\Facades\Route;

// Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {
      /*
      |--------------------------------------------------------------------------
      | Coupons Routes
      |--------------------------------------------------------------------------
      */
      Route::resource('coupons', 'Admin\CouponsController', ['except' => ['show', 'search', 'create']]);

// });

// Route::group(['namespace' => 'FrontEnd', 'as' => 'customer.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Coupons Routes
    |--------------------------------------------------------------------------
    */
    // TODO: Check coupon is used by current customer
    Route::post('coupons/check', ['as'  => 'coupons.check', 'uses'  => 'FrontEnd\CouponsController@check']);
    Route::post('coupons/remove', ['as' => 'coupons.remove', 'uses' => 'FrontEnd\CouponsController@remove']);


// });
