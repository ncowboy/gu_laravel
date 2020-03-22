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

    Route::get('/article/{id}', [
        'uses' => 'NewsController@article',
        'as' => 'article'
    ]);

    Route::get('/create', [
        'uses' => 'NewsController@articleCreate',
        'as' => 'create'
    ]);
});
