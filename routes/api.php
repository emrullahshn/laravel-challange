<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/login', 'Api\UserController@login');

Route::group(['middleware' => 'auth:api', 'prefix' => 'user'], static function () {
    Route::get('/', 'Api\UserController@user');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'info'], static function () {
    Route::get('/', 'Api\ApplicationController@index');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'categories'], static function () {
    Route::get('/', 'Api\CategoryController@getAll');
    Route::get('/{id}', 'Api\CategoryController@getCategoryDetails');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'songs'], static function () {
    Route::get('/listen/{id}', 'Api\SongController@getSong');
});

Route::group(['middleware' => 'auth:api', 'prefix' => 'favorites'], static function () {
    Route::post('/add', 'Api\FavoriteController@add');
    Route::post('/remove', 'Api\FavoriteController@remove');
    Route::get('/list', 'Api\FavoriteController@list');
});


