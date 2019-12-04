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

Auth::routes();

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/', 'PostsController@index')->name('home');
Route::post('/posts', 'PostsController@store')->name('posts.store');
Route::get('/posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::delete('/posts/{post}/destroy', 'PostsController@destroy')->name('posts.destroy')->middleware('can:delete,post');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit')->middleware('can:update,post');
Route::put('/posts/{post}/update', 'PostsController@update')->name('posts.update')->middleware('can:update,post');

Route::get('/users/{user}/profile', 'ProfileController@show')->name('profile.show');
Route::get('/users/{user}/profile/edit', 'ProfileController@edit')->name('profile.edit')->middleware('can:update,profile');
Route::put('/users/{user}/profile/update', 'ProfileController@update')->name('profile.update')->middleware('can:update,profile');