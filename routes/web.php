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

Route::get('/', [
    'uses' => 'SiteController@index',
    'as' => 'index'
]);

Route::group([
    'prefix' => 'news',
    'as' => 'news::'

], function () {
    Route::get('/', [
        'uses' => 'NewsController@index',
        'as' => 'index'
    ]);

    Route::get('/category/{id}', [
        'uses' => 'NewsController@category',
        'as' => 'category'
    ]);

    Route::post('/leave-comment', [
        'uses' => 'NewsController@leaveComment',
        'as' => 'leave-comment'
    ]);

    Route::get('/article/{id}', [
        'uses' => 'NewsController@article',
        'as' => 'article'
    ]);

    Route::match(['post', 'get'], '/create', [
        'uses' => 'NewsController@articleCreate',
        'as' => 'create'
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin routes

Route::group([
    'prefix' => 'admin',
    'as' => 'admin::'

], function () {
    Route::get('/', [
        'uses' => 'Admin\DefaultController@index',
        'as' => 'default'
    ]);

//Users

    Route::group([
        'prefix' => 'users',
        'as' => 'users::'
    ], function () {
        Route::get('/', [
            'uses' => 'Admin\UsersController@index',
            'as' => 'index'
        ]);
        Route::match(['post', 'get'], '/update/{id}', [
            'uses' => 'Admin\UsersController@update',
            'as' => 'update'
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\UsersController@create',
            'as' => 'create'
        ]);
        Route::post('/delete/{id}', [
            'uses' => 'Admin\UsersController@delete',
            'as' => 'delete'
        ]);
    });

    //News

    Route::group([
        'prefix' => 'news',
        'as' => 'news::'
    ], function () {
        Route::get('/', [
            'uses' => 'Admin\NewsController@index',
            'as' => 'index'
        ]);
        Route::match(['post', 'get'], '/update/{model}', [
            'uses' => 'Admin\NewsController@update',
            'as' => 'update'
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\NewsController@create',
            'as' => 'create'
        ]);
        Route::post('/delete/{model}', [
            'uses' => 'Admin\NewsController@delete',
            'as' => 'delete'
        ]);
    });

    //Categories

    Route::group([
        'prefix' => 'categories',
        'as' => 'categories::'
    ], function () {
        Route::get('/', [
            'uses' => 'Admin\CategoriesController@index',
            'as' => 'index'
        ]);
        Route::match(['post', 'get'], '/update/{model}', [
            'uses' => 'Admin\CategoriesController@update',
            'as' => 'update'
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\CategoriesController@create',
            'as' => 'create'
        ]);
        Route::post('/delete/{model}', [
            'uses' => 'Admin\CategoriesController@delete',
            'as' => 'delete'
        ]);
    });

// Comments

    Route::group([
        'prefix' => 'comments',
        'as' => 'comments::'
    ], function () {
        Route::get('/', [
            'uses' => 'Admin\CommentsController@index',
            'as' => 'index'
        ]);
        Route::match(['post', 'get'], '/update/{model}', [
            'uses' => 'Admin\CommentsController@update',
            'as' => 'update'
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\CommentsController@create',
            'as' => 'create'
        ]);
        Route::post('/delete/{model}', [
            'uses' => 'Admin\CommentsController@delete',
            'as' => 'delete'
        ]);
    });
});
