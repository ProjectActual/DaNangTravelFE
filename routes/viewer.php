<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '/posts/{uri_category}', 'as' => 'posts.'], function () {
    Route::get('/', 'PostController@index')->name('index');
});
