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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');

Route::get('/posts','PostsController@index')->name('list_fotos');

Route::get('/posts/create','PostsController@create');

Route::post('/posts','PostsController@store');

Route::post('/comment/comentar/{id}','CommentController@comment')->name('comment');

Route::post('/comment/excluir/{id}','CommentController@excluir')->name('excluir');

Route::get('/post/like/{id}','PostsController@like');

Route::get('/post/dislike/{id}','PostsController@dislike');

Route::get('/post/excluir/{id}','PostsController@excluir');

Route::resource('notifications', 'NotificationController');
