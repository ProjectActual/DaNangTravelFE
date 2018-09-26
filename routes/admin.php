<?php

Route::group(['namespace' => 'Auth\\'], function () {
    Route::get('/login', 'LoginController@formLogin')->name('formLogin');

    Route::get('/forget-password', 'LoginController@forgetPassword')->name('forget_password');
});

Route::group(['prefix' => 'posts', 'as' => 'posts.', 'middleware' => 'authen'], function() {
    Route::get('/', 'PostController@index')->name('index');

    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/update/{id}', 'PostController@update')->name('update');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => 'authen'], function() {
    Route::get('/', 'ProfileController@index')->name('index');
});
