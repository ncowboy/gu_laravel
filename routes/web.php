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

use App\Http\Middleware\CategoryValidate;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CommentValidate;
use App\Http\Middleware\NewsValidate;
use App\Http\Middleware\UsersValidate;

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

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');


// Admin routes

Route::group([
    'prefix' => 'admin',
    'as' => 'admin::',
    'middleware'=> ['auth']

], function () {
    Route::get('/', [
        'uses' => 'Admin\DefaultController@index',
        'as' => 'default'
    ]);

//Users

    Route::group([
        'prefix' => 'users',
        'as' => 'users::',
//        'middleware' => CheckAdmin::class
    ], function () {
        Route::get('/', [
            'uses' => 'Admin\UsersController@index',
            'as' => 'index'
        ]);
        Route::match(['post', 'get'], '/update/{model}', [
            'uses' => 'Admin\UsersController@update',
            'as' => 'update',
            'middleware' => UsersValidate::class
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\UsersController@create',
            'as' => 'create',
            'middleware' => UsersValidate::class
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
            'as' => 'update',
            'middleware' => NewsValidate::class
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\NewsController@create',
            'as' => 'create',
            'middleware' => NewsValidate::class
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
            'as' => 'update',
            'middleware' => CategoryValidate::class
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\CategoriesController@create',
            'as' => 'create',
            'middleware' => CategoryValidate::class
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
            'as' => 'update',
            'middleware' => CommentValidate::class
        ]);
        Route::match(['post', 'get'], '/create', [
            'uses' => 'Admin\CommentsController@create',
            'as' => 'create',
            'middleware' => CommentValidate::class
        ]);
        Route::post('/delete/{model}', [
            'uses' => 'Admin\CommentsController@delete',
            'as' => 'delete'
        ]);
    });
});
