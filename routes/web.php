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

Route::get('/', function () {
    return view("index");
});

Route::get('/about', function () {
    return view("about");
});

Route::get('/news', function () {
    return view("news");
});

Route::get('/news/1', function () {
    return view("news1");
});

Route::get('/news/2', function () {
    return view("news2");
});

Route::get('/news/3', function () {
    return view("news3");
});

