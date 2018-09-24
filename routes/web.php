<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/lte2', function () {
    return view('admin.layouts.master');
});

Route::get('unauthentication', function () {
    return view('errors.unauthentication');
});

Route::get('not-found', function () {
    return view('errors.not_found');
});
