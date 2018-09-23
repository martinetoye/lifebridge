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

//Home Page Controller
Route::get('/', 'HomeController@index')->name('home');
//User Controllers
Route::get('profile/{username}', 'UserController@profile')->name('profile');
Route::get('profile/{username}/update', 'UserController@settings')->name('profile.update');
Route::post('profile/updated', 'UserController@update')->name('profile.updated');
Route::get('profile/follow/{id}', 'UserController@follow')->name('follow');
Auth::routes();

//Post Controller
Route::post('post', 'PostController@store')->name('post.post');
Route::get('post/{post}', 'PostController@show')->name('post.single');
Route::get('post/like/{id}', 'PostController@like')->name('post.like');
Route::get('post/share/{id}', 'PostController@reshare')->name('post.reshare');
Route::get('post/vote/{id}', 'PostController@vote')->name('post.vote');
Route::get('post/vote/cancel/{id}', 'PostController@cancelVote')->name('post.vote.cancel');
Route::get('post/edit/{id}', 'PostController@edit')->name('post.edit');
Route::post('post/edit/{id}', 'PostController@update')->name('post.update');
Route::get('post/delete/{id}', 'PostController@destroy')->name('post.delete');
