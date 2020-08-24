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

Route::get('/', 'HomeController@index')->name("Home");

Route::group([
    'prefix' => 'news',
    'namespace' => 'News',
    'as' => 'News.'
], function () {
    Route::get('/', 'IndexController@index')->name("index");
    Route::get('/{news}', 'IndexController@show')->name("one");
});


Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'Admin.'
], function () {
    Route::get('/', 'IndexController@index')->name("index");
    Route::resource('categories', 'CategoriesController')->except(['show']);
    Route::resource('news', 'NewsController')->except(['show']);
});


Route::group([
    'prefix' => 'categories',
    'as' => 'Category.'
], function () {
    Route::get('/', 'CategoryController@index')->name("index");
    Route::get('/{categoryName}', 'CategoryController@show')->name("one");
});


Auth::routes();

