<?php

Route::group(['namespace' => 'Auth\\'], function () {
    Route::get('/register', 'RegisterController@register')->name('register');
    Route::get('/register/{activation_token}', 'RegisterController@credential')->name('credential');

    Route::get('/login', 'LoginController@formLogin')->name('formLogin');

    Route::get('/forget-password', 'LoginController@forgetPassword')->name('forget_password');

    Route::get('/forget-password/change-password/{token}', 'LoginController@changePassword')->name('change_password');
});

Route::group(['middleware' => ['authen', 'credential']], function () {

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function() {
        Route::get('/', 'PostController@index')->name('index');

        Route::get('/create', 'PostController@create')->name('create');
        Route::get('/update/{id}', 'PostController@update')->name('update');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function() {
        Route::get('/', 'ProfileController@index')->name('index');
    });

    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function() {
        Route::get('/', 'TagController@index')->name('index');
    });

    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function() {
        Route::get('/', 'CategoryController@index')->name('index');
    });


    Route::group(['prefix' => 'feedbacks', 'as' => 'feedbacks.'], function() {
        Route::get('/', 'FeedbackController@index')->name('index');
    });

    Route::group(['prefix' => 'statistics', 'as' => 'statistics.'], function() {
        Route::get('/post', 'StatisticController@postStatistic')->name('post');
    });
});

Route::group(['prefix' => 'congtacvien', 'as' => 'ctv.', 'middleware' => 'authen'], function() {
    Route::get('/credential', 'CongTacVienController@credential')->name('credential');
    Route::get('/', 'CongTacVienController@index')
        ->middleware('credential')
        ->name('index');
});
