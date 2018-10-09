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

Route::get('unauthorization', function () {
    return view('errors.unauthorization');
})->name('errors.unauthorization');

Route::get('not-found', function () {
    return view('errors.not_found');
})->name('errors.not_found');

Route::get('credential/email', function () {
    return view('errors.credential.email');
})->name('errors.credential.email');

Route::get('credential/admin', function () {
    return view('errors.credential.admin');
})->name('errors.credential.admin');
