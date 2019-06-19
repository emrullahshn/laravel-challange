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


