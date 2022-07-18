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
Route::post('user-followers-following','Api\UserController@userFollowersFollowing');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
    return response()->json(['status'=>200, 'message'=>'Successfully','data' => $request->user()]);
});


Route::get('/about','Api\SettingController@about');

Route::post('signUp','Api\AuthenticationController@signUp');
// Route::post('reSendOtp','Api\AuthenticationController@reSendOtp');
Route::post('verifyCode','Api\AuthenticationController@verifyCode');
Route::post('login','Api\AuthenticationController@login');
Route::post('socialLogin','Api\AuthenticationController@socialLogin');
Route::post('resetPassword','Api\AuthenticationController@resetPassword');

// forgot password
Route::post('password/mail', 'Api\AuthenticationController@forgetPasswordMail');

Route::group(['prefix' => '/', 'middleware' => 'auth:api'], function(){

    // change password
    Route::post('password/reset', 'Api\AuthenticationController@reset');

	Route::get('personalProfile','Api\AuthenticationController@personalProfile');
	Route::post('updateProfile','Api\AuthenticationController@updateProfile');
	Route::get('logout','Api\AuthenticationController@logout');

    // Settings Routes
    // Route::get('/about','Api\SettingController@about');
    Route::get('/levels','Api\SettingController@levels');

    // Rake Routes
    Route::get('rakes', 'Api\RakeController@index');
    Route::post('rakes', 'Api\RakeController@store');
    Route::get('rakes/{rake}', 'Api\RakeController@show');
    Route::delete('rakes/{rake}', 'Api\RakeController@destroy');
    Route::post('rakeLike', 'Api\RakeController@rakeLike');
    Route::post('unLikeRake', 'Api\RakeController@unLikeRake');
    Route::post('follow', 'Api\RakeController@follow');
    // Route::delete('unFollow/{id}', 'Api\RakeController@unFollow');
    Route::post('unFollow', 'Api\RakeController@unFollow');
    Route::get('get-rake-comments/{rake}', 'Api\RakeController@getRakeComments');
    Route::post('addRakeComment', 'Api\RakeController@addRakeComment');
    Route::get('my-rakes', 'Api\RakeController@myRakes');
    Route::post('add_share_rake','Api\RakeController@ShareRake');

    // User Routes
    Route::get('users','Api\UserController@index');
    Route::get('dashboard','Api\UserController@dashboard');
    Route::get('home','Api\UserController@homeScreen');
    
    Route::get('all-community-users','Api\UserController@allCommunityUsers');
    Route::post('search-community-user','Api\UserController@searchCommunityUser');
    Route::post('send-message','Api\UserController@sendMessage');
    Route::post('get-conversations','Api\UserController@getConversations');
    Route::post('get-messages','Api\UserController@getMessages');
    Route::post('update-message-counter','Api\UserController@updateMessageCounter');
    Route::post('community-user-profile','Api\UserController@communityUserProfile');
    Route::post('login-user-profile','Api\UserController@loginUserProfile');
    Route::post('get-messages-without-conv-id','Api\UserController@getMessagesWithoutConvId');
    Route::post('/searchFriendUser', 'Api\UserController@searchFriendUser');
    Route::post('GetUserByName', 'Api\UserController@Get_Users_ByName');
    
    
    Route::post('shareRakeWithCreateRake', 'Api\RakeController@shareRakeWithCreateRake');
    
});







