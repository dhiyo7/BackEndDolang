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
  Route::get('pariwisata/edit/{tour}','Admin\TourController@edit')->name('tour.edit');
  Route::patch('pariwisata/update/{tour}','Admin\TourController@update')->name('tour.update');
  Route::post('pariwisata/delete/{tour}','Admin\TourController@destroy')->name('tour.destroy');
  Route::get('pariwisata/detail/{tour}','Admin\TourController@show')->name('tour.detail');
  Route::get('pengguna','Admin\UserController@index')->name('user');
  Route::patch('pengguna/{user}','Admin\UserController@activation')->name('user.activation');
  Route::get('pengguna/{user}','Admin\UserController@edit')->name('user.edit');
  Route::patch('pengguna/update/{user}','Admin\UserController@update')->name('user.update');
  Route::get('komentar','Admin\CommentController@index')->name('comment');
  Route::post('komentar/{comment}','Admin\CommentController@destroy')->name('comment.destroy');
  Route::post('pariwisata/edit/{panorama}','Admin\TourController@panoramaDestroy')->name('panorama.destroy');
  Route::get('pariwisata/{category}','Admin\TourController@filter')->name('tour.filter');
});

// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
