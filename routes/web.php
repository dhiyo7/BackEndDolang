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

Route::get('/','Admin\AuthAdminController@showLoginForm')->name('welcome');

Route::group(['prefix' => '/'], function(){
  Route::post('login','Admin\AuthAdminController@login')->name('login');
  Route::post('logout','Admin\AuthAdminController@logoutAdmin')->name('logout');
  Route::get('beranda','Admin\HomeController@index')->name('home');
  Route::get('pariwisata','Admin\TourController@index')->name('tour');
  Route::get('pariwisata/tambah','Admin\TourController@create')->name('tour.create');
  Route::post('pariwisata/tambah','Admin\TourController@store')->name('tour.store');
  Route::get('pariwisata/edit/{tour}','TourController@edit')->name('tour.edit');
  Route::patch('pariwisata/update/{tour}','TourController@update')->name('tour.update');
  Route::post('pariwisata/delete/{tour}','TourController@destroy')->name('tour.destroy');
  Route::get('pariwisata/detail/{tour}','TourController@show')->name('tour.detail');

});

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
