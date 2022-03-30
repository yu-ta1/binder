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

Route::get('/', 'TeamController@mypage');

Route::get('/teams/mypage', 'TeamController@mypage');

Route::get('/teams/search', 'TeamController@search');

Route::post('/team/join', 'TeamController@join');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
