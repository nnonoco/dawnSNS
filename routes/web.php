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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();


//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');


//ログイン中のページ
Route::get('/top', 'PostsController@index');

Route::post('post/create', 'PostsController@create');

//投稿変更画面
Route::get('/post/{id}/update-form', 'PostsController@updateForm');

Route::get('/post/update', 'PostsController@postUpdate');
//投稿削除
Route::get('/post/{id }/delete', 'PostsController@delete');

//ログインユーザーのプロフィール
Route::get('/login-profile', 'PostsController@profile');

Route::get('/login-profile/update', 'PostsController@update');
//フォローフォロワーのプロフィール
Route::get('/post/{id}/profile', 'UsersController@profile');

//検索ページ
Route::get('/search', 'UsersController@search');

Route::post('/search/result', 'UsersController@result');

//フォローリスト
Route::get('/follow-list', 'FollowsController@followList');
//フォロワーリスト
Route::get('/follower-list', 'FollowsController@followerList');

//フォローする、削除する
Route::post('/follow', 'FollowsController@follow');
Route::post('/follow/delete', 'FollowsController@followDelete');
//ログアウト
Route::get('/logout', 'PostsController@logout');