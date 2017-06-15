<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('campaign-chat', 'CampaignChatController');

Route::resource('language', 'MultipleLanguageController', [
    'only' => ['store'],
]);

Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\UserRegisterController@getRegister',
]);

Route::post('register', [
    'as' => 'register',
    'uses' => 'Auth\UserRegisterController@postRegister',
]);

Route::get('login', [
    'as' => 'get_login',
    'uses' => 'Auth\UserLoginController@getLogin',
]);

Route::post('login', [
    'as' => 'post_login',
    'uses' => 'Auth\UserLoginController@postLogin',
]);

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\UserLoginController@logout',
]);

Route::get('link/verification/{id}/{tokenRegister?}', [
    'as' => 'verification',
    'uses' => 'Auth\VerifyController@index',
]);

Route::get('/redirect/{provider}', 'Auth\SocialAuthController@redirect');
Route::get('/callback/{provider}', 'Auth\SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('user', 'UserController');

    Route::get('user/{userId}/follower', 'UserController@follower');

    Route::get('user/{userId}/following', 'UserController@following');

    Route::get('campaigns/create', 'CampaignController@create');

    Route::get('campaigns/{id}/event-create', 'EventController@eventCreate');

    Route::post('event/create', 'EventController@store');

    Route::get('blog/create', 'OrtherController@createBlog');

    Route::post('blog/create', 'OrtherController@saveBlog');

    Route::post('campaigns/create', 'CampaignController@store');

    Route::post('campaigns/update', 'CampaignController@update');

    Route::resource('event', 'EventController');

    Route::get('user/{userId}/campaigns', 'UserController@listUserCampaign');

    Route::get('user/{userId}/event', 'UserController@listUserEvent');

    Route::get('user/{userId}/blog', 'UserController@listUserBlog');

    Route::delete('blog/{blogId}', 'OrtherController@deleteBlog');

    Route::get('user/{userId}/campaigns/{campaignId}', 'UserController@manageCampaign');

    Route::post('campaigns/approve', 'CampaignController@approveOrRemove');

    Route::post('contribution/confirm', 'ContributionController@confirmContribution');

    Route::post('campaign/active', 'CampaignController@activeOrCloseCampaign');

    Route::post('rating/ratingCampaign', 'RatingController@ratingCampaign');

    Route::post('rating/ratingUser', 'RatingController@ratingUser');

    Route::post('campaign/uploadImage', 'CampaignController@uploadImage');

    Route::post('follow/user', 'FollowController@followOrUnFollowUser');
});

Route::get('campaigns', 'CampaignController@showCampaigns');

Route::get('', 'CampaignController@index');

Route::get('aboutUs', 'OrtherController@aboutUs');

Route::get('faq', 'OrtherController@faq');

Route::get('member', 'OrtherController@member');

Route::get('blog', 'OrtherController@blog');

Route::get('contact', 'OrtherController@contact');

Route::post('contact', 'OrtherController@store');

Route::post('review', 'CampaignController@review');

Route::get('campaigns/{id}', 'CampaignController@show');

Route::get('confirmed/{id}', 'CampaignController@confirmed');
Route::get('unconfirmed/{id}', 'CampaignController@unconfirmed');

Route::resource('contribution', 'ContributionController');

Route::post('comment/create', 'CommentController@store');

Route::post('request-join', 'CampaignController@joinOrLeaveCampaign');

Route::get('campaign/search', 'CampaignController@searchCampaign');

Route::get('event', 'EventController@index');

Route::get('event/{eventId}', 'EventController@show');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
    Route::resource('user', 'UserController', [
        'except' => 'show',
    ]);

    Route::resource('campaigns', 'CampaignController');
});
