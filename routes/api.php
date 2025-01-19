<?php

use App\Http\Controllers\SupabaseUsersController;
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
    Route::get('tags', 'FoodItemTagsController@getLatestTags');
});

Route::group([
    /*'middleware' => 'api',*/    // We will add this middleware inside our AuthController.php
    //'prefix' => 'auth',
    'namespace' => 'Supabase' //If the all the controllers related to API are inside API folder.
], function () {

    Route::get('supabase/users', 'SupabaseUsersController@index');
    Route::get('supabase/users/{id}', 'SupabaseUsersController@show');
    Route::post('supabase/users', 'SupabaseUsersController@store');
    Route::patch('supabase/users/{id}', 'SupabaseUsersController@update');
    Route::delete('supabase/users/{id}', 'SupabaseUsersController@destroy');
});


