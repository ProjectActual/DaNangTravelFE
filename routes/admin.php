<?php

Route::group(['namespace' => 'Auth\\'], function () {
    Route::get('/login', 'LoginController@formLogin')->name('formLogin');
});

Route::group(['prefix' => 'posts', 'as' => 'posts.'], function() {
    Route::get('/', 'PostController@index')->name('index');

    Route::get('/create', 'PostController@create')->name('create');
    Route::get('/update/{id}', 'PostController@update')->name('update');
});
