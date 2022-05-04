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

// TeamController
Route::group(['middleware' => ['auth']], function(){

    Route::get('/', 'TeamController@mypage');
    
    Route::get('/homes', 'TeamController@search');
    
    Route::get('/homes/mypage', 'TeamController@mypage');
    
    Route::get('/homes/search', 'TeamController@search');
    
    Route::get('/homes/create', 'TeamController@create');
    
    Route::post('/homes/join', 'TeamController@join');
    
    Route::delete('/homes/{team}/exit', 'TeamController@exit');
    
    Route::post('/teams', 'TeamController@store');
    
    // NoticePostController
    
    Route::get('/teams/{team}/notices/index', 'NoticePostController@notice');
    
    Route::get('/teams/{team}/notice_posts/{notice_post}/show', 'NoticePostController@notice_show');
    
    Route::get('/teams/{team}/notices/create', 'NoticePostController@notice_create');
    
    Route::post('/teams/{team}/notices/store', 'NoticePostController@notice_store');
    
    Route::delete('/teams/{team}/notice_posts/{notice_post}/delete', 'NoticePostController@notice_delete');
    
    Route::post('/teams/{team}/notice_posts/{notice_post}/comments', 'NoticePostController@notice_comment');
    
    Route::post('/teams/{team}/notice_posts/{notice_post}/goods', 'NoticePostController@notice_good');
    
    Route::delete('/teams/{team}/notice_posts/{notice_post}/comments/{notice_post_comment}/delete', 'NoticePostController@comment_delete');
    
    // TimeLinePostController
    
    Route::get('/teams/{team}/time_lines/index', 'TimeLinePostController@time_line');
    
    Route::get('/teams/{team}/time_line_posts/{time_line_post}/show', 'TimeLinePostController@time_line_show');
    
    Route::get('/teams/{team}/time_lines/create', 'TimeLinePostController@time_line_create');
    
    Route::post('/teams/{team}/time_lines/store', 'TimeLinePostController@time_line_store');
    
    Route::delete('/teams/{team}/time_line_posts/{time_line_post}/delete', 'TimeLinePostController@time_line_delete');
    
    Route::post('/teams/{team}/time_line_posts/{time_line_post}/comments', 'TimeLinePostController@time_line_comment');
    
    Route::post('/teams/{team}/time_line_posts/{time_line_post}/goods', 'TimeLinePostController@time_line_good');
    
    Route::delete('/teams/{team}/time_line_posts/{time_line_post}/comments/{time_line_post_comment}/delete', 'TimeLinePostController@comment_delete');
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');