<?php

Route::get('/privacyPolicy', function () {
    return view('privacy_policy_view');
});

Route::get('/termsofServices', function () {
    return view('terms_service_view');
});

Route::get('/userDataInstruction', function () {
    return view('user_data_instruction_view');
});

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.signin')->middleware('guest');

Auth::routes();

Route::view('forgot', 'forgotPassword');
Route::view('tables', 'theme_tables');

Route::get('confirm/{id}','AuthController@Confirm_Password');
Route::post('update','AuthController@Update_Password');
Route::post('check','AuthController@Forgot_Password');

Route::group(['middleware' => 'auth'], function () {

    //common routes
    Route::get('dashboard','HomeController@dashboard')->name('dashboard');
    Route::get('change-password', 'HomeController@changePassword')->name('password.edit');
    Route::post('chang-password','HomeController@passwordUpdate')->name('password.update');
    Route::get('logout','AuthController@logout');
    Route::get('profile','HomeController@profile')->name('profile');
    Route::patch('profile','HomeController@profileUpdate')->name('profile.update');

    // Settings Routes
    Route::get('/about','SettingController@aboutForm')->name('about.form');
    Route::post('/about','SettingController@aboutUpdate')->name('about.update');
    Route::get('/points','SettingController@pointsIndex')->name('points.index');
    Route::patch('/points/{point}','SettingController@pointsUpdate')->name('points.update');
    Route::get('/levels','SettingController@levelsIndex')->name('levels.index');
    Route::post('/levels','SettingController@levelsStore')->name('levels.store');
    Route::patch('/levels/{level}','SettingController@levelsUpdate')->name('levels.update');

    // Rake Routes
    Route::get('/user-rakes', 'RakeController@userRakes')->name('userRakes');
    Route::get('/user-rakes/{rake}', 'RakeController@userRakeShow')->name('userRakes.show');
    Route::get('/daily-rakes', 'RakeController@dailyRakes')->name('dailyRakes');
    Route::get('/daily-rakes/{rake}', 'RakeController@dailyRakeShow')->name('dailyRakes.show');
    Route::post('/daily-rakes', 'RakeController@dailyRakeCreate')->name('dailyRakes.create');
    Route::delete('/rakes/{rake}', 'RakeController@destroy')->name('rakes.delete');

    // App User Routes
    Route::get('/app-users', 'UserController@index')->name('app-users');
    Route::delete('/app-users/{user}', 'UserController@destroy')->name('app-users.delete');
    Route::post('/app-users/{user}', 'UserController@dailyLeaderToggle')->name('app-users.daily-leader-toggle');
    Route::get('/app-users/{user}/edit', 'UserController@edit')->name('user_edit');
    Route::post('/app-users','UserController@userStore')->name('app-users.store');
    Route::patch('/app-users/{user}','UserController@userUpdate')->name('app-users.update');

    Route::group(['middleware' => 'superadmin'], function () {

        Route::post('update-profile','AuthController@Update_Profile');
        Route::post('edit_profile','AuthController@edit_profile');

    });

    //admin routes
    Route::group(['middleware' => 'admin'], function () {

    });

});
