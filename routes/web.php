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

Route::get('/', 'PostsController@blog')->name('blog');
Route::get('/single/{id}', 'PostsController@single')->name('single');

Route::group(['middleware' => ['auth']], function() {
	
	Route::get('/admin', 'PostsController@view')->name('admin.view');
	Route::post('/posts', 'PostsController@post')->name('post');
	Route::get('/list', 'PostsController@show')->name('show');
	Route::get('/edit/{id}', 'PostsController@edit')->name('edit');
	Route::PUT('/update/{id}', 'PostsController@update')->name('update');
	Route::DELETE('/destroy/{id}', 'PostsController@destroy')->name('posts.destroy');

});


Auth::routes();

