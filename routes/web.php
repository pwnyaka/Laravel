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
Route::get('/info', 'HomeController@info')->name("info");

Route::group([
    'prefix' => 'social',
    'namespace' => 'Social',
    'as' => 'Social.'
], function () {
    Route::group([
        'prefix' => 'vk',
        'namespace' => 'VK',
        'as' => 'vk.'
    ], function () {
        Route::get('/auth', 'LoginController@login')->name("login");
        Route::get('/auth/response', 'LoginController@response')->name("response");
    });
    Route::group([
        'prefix' => 'github',
        'namespace' => 'GitHub',
        'as' => 'github.'
    ], function () {
        Route::get('/auth', 'LoginController@login')->name("login");
        Route::get('/auth/response', 'LoginController@response')->name("response");
    });
});



//Route::get('auth/vk', 'LoginController@loginVK')->name('loginVK');
//Route::get('auth/vk/response', 'LoginController@responseVK')->name('responseVK');

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
    'as' => 'Admin.',
    'middleware' => ['auth', 'is_admin'],
], function () {
    Route::get('/', 'IndexController@index')->name("index");
    Route::resource('categories', 'CategoriesController')->except(['show']);
    Route::resource('news', 'NewsController')->except(['show']);
    Route::resource('users', 'UsersController')->except(['show']);
    Route::post('users/{id}/toggle-status', 'UsersController@toggleStatus');
    Route::match(['get', 'post'], '/profile', 'ProfileController@update')->name('updateProfile');
    Route::get('parser', 'ParserController@index')->name('parser');
});

Route::group([
    'prefix' => 'user',
    'namespace' => 'User',
    'as' => 'User.',
    'middleware' => 'auth',
], function () {
    Route::match(['get', 'post'], '/profile', 'ProfileController@update')->name('updateProfile');
});


Route::group([
    'prefix' => 'categories',
    'as' => 'Category.'
], function () {
    Route::get('/', 'CategoryController@index')->name("index");
    Route::get('/{categoryName}', 'CategoryController@show')->name("one");
});


Auth::routes();

