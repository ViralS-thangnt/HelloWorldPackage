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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');


// //     // Test route
// //     // Route::get('/testPush', 'TestController@testPush');
// //     // Route::get('/testPushFCM', 'TestController@testPushFCM');
// //     // Route::get('/testCronPush', 'TestController@testCronPush');
// //     // Route::get('/testXML', 'TestController@testXML');


// // API Routers
// Route::get('config', ['as' => 'api.v1.config', 'uses' => 'Api\ConfigController@config']);
// Route::post('login', ['as' => 'api.v1.users.login', 'uses' => 'Api\AuthController@login']);

// Route::post('forgot', ['as' => 'api.v1.users.forgot', 'uses' => 'Api\AuthController@forgot']);
// Route::get('getForgotPassword', ['as' => 'api.v1.forgot.reset', 'uses' => 'Api\AuthController@getForgotPassword']);

// // Private routes

// Route::group(['middleware' => ['user-auth-jwt']], function () {

//     Route::post('logout', ['as' => 'api.post.logout', 'uses' => 'Api\AuthController@logout']);

//     // Todo routes
//     Route::post('todos/{todo_id}/completed', ['as' => 'todos.completed', 'uses' => 'Api\TodoController@completed']);
//     Route::resource('todos', 'Api\TodoController', ['only' => ['index', 'store', 'update', 'destroy']]);

//     // Order routes
//     Route::resource('orders', 'Api\OrderController');
//     Route::post('orders/{order_id}/cancel', ['as'=>'api.v1.order.cancel', 'uses'=>'Api\OrderController@cancel']);

//     // Calendar routes
//     Route::post('calendars/{calendar_id}/deliveried', ['as' => 'calendars.deliveried', 'uses' => 'Api\CalendarController@deliveried']);
//     Route::resource('calendars', 'Api\CalendarController', ['only' => ['index', 'store', 'update', 'destroy']]);

// });



