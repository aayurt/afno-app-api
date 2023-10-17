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


Route::group([
    /*'middleware' => 'api',*/    // We will add this middleware inside our AuthController.php
    //'prefix' => 'auth',
    'namespace' => 'Admin' //If the all the controllers related to API are inside API folder.
], function () {
    Route::get('restaurants/{lang}', 'RestaurantsController@latestRestaurants');
});