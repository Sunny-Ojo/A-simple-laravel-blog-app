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
    return view('about');
});
Route::get('/privacy', function () {
    return view('privacy');
});

Auth::routes();
Route::resource('posts', 'PostsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/contact', 'PagesController@contact');
Route::get('/messages', 'PagesController@messages');
Route::post('/messages', 'PagesController@destroy');
Route::resource('pages', 'PagesController');