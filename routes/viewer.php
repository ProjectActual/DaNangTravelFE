<?php

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'posts/{uri_category}', 'as' => 'posts.'], function () {
    Route::get('/', 'PostController@index')->name('index');

    Route::get('/{uri_post}', 'PostController@show')->name('show');
});

Route::group(['prefix' => 'tags/{uri_tag}', 'as' => 'tags.'], function () {
    Route::get('/', 'TagController@index')->name('index');
});

Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks');

Route::get('/search', 'PostController@search')->name('search');
