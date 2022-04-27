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

Route::get('/homes', 'TeamController@search');

Route::get('/homes/mypage', 'TeamController@mypage');

Route::get('/homes/search', 'TeamController@search');

Route::get('/homes/create', 'TeamController@create');

Route::post('/homes/join', 'TeamController@join');

Route::post('/teams', 'TeamController@store');

// Route::post('/teams/notices/create', 'PostController@notice_store');

Route::get('/teams/{team}/notices/index', 'PostController@notice');

Route::get('/teams/{team}/notices/create', 'PostController@notice_create');

Route::post('/teams/{team}/notices/store', 'PostController@notice_store');


Route::get('/teams/{team}/time_lines/index', 'PostController@time_line');

Route::get('/teams/{team}/time_lines/create', 'PostController@time_line_create');

Route::post('/teams/{team}/time_lines/store', 'PostController@time_line_store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');