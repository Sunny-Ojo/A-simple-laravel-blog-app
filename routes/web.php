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

Route::get('/', 'PostsController@index');
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('privacy');
});

Auth::routes();
Route::get('/blog/categories', 'LikesController@category')->name('blog.category');
Route::get('/like/{post}', 'LikesController@like');
Route::get('/unlike/{post}', 'LikesController@unlike');
Route::get('/comment/{post}', 'LikesController@unlike');
Route::get('/remove/comment/{post}', 'LikesController@deleteComment');
Route::get('/posts/{post}/comment', 'LikesController@comments');
Route::post('reply/send/{post}', 'LikesController@storeReply')->name('posts.reply');
Route::resource('posts', 'PostsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@home')->name('dashboard');
Route::post('/contact', 'PagesController@contact');
Route::get('/messages', 'PagesController@messages');
Route::post('/messages', 'PagesController@destroy');
Route::resource('pages', 'PagesController');