<?php

use Illuminate\Http\Request;

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

Route::get('/tour','API\TourController@index');
Route::get('/tour/{tour}','API\TourController@show');
Route::get('/category/{category}','API\TourController@category');
Route::post('/user/register','API\UserController@register');
Route::post('/user/login','API\UserController@login');
Route::get('/user/profile','API\UserController@profile')->middleware('auth:api');
Route::post('/user/profile','API\UserController@updateProfile')->middleware('auth:api');
Route::post('/user/comment','API\UserController@comment')->middleware('auth:api');


Route::post('tour/search','API\TourController@search');
