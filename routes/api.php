<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/posts', 'Api\PostsController');

Route::post('/like', 'Api\PostsController@like');
Route::post('/vote', 'Api\PostsController@vote');
Route::post('/downvote', 'Api\PostsController@cancelVote');


/*Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function(){
  Route::resource('/posts', 'Api\PostsController');
});*/
