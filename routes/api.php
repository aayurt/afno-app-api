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
    Route::get('category/{lang}', 'CategoriesController@showCategory');
    Route::get('memberCategory/{lang}', 'MemberCategoriesController@showMemberCategory');
    Route::get('affiliatedCategory/{lang}', 'AffiliatedCategoriesController@showAffiliatedCategory');
    Route::get('post/{lang}', 'PostsController@showPost');
    Route::post('member', 'MembersController@showPostMember');
    Route::post('affiliatedGroup', 'AffiliatedGroupsController@showPostAffiliatedGroups');
    Route::post('post', 'PostsController@showPostPost');
    Route::post('lineage', 'LineagesController@showPostLineage');


    Route::get('post/{id}/{lang}', 'PostsController@showSinglePost');
    Route::get('postcategories/{cid}/{lang}', 'CategoriesController@showCategoryPosts');
    Route::get('getHome/{lang}', 'PostsController@showCategoryNepalPoliticsWorldPost');
    Route::get('getAffiliatedCategory/{id}/{lang}', 'PostsController@showPostDifferentCategory');
    Route::get('postLatest/{lang}', 'PostsController@latestPost');
    Route::get('e_ad/{page}/{direction}', 'AdsController@ads');
    Route::get('archiveCategories', 'ArchivesController@latestArchives');
    Route::get('activities/{lang}', 'ActivitiesController@latestActivities');
});