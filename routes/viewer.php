<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => '/{uri_category}', 'as' => 'posts.'], function () {
    Route::get('/', 'PostController@index')->name('index');

    Route::get('/{uri_post}', 'PostController@show')->name('show');
});
