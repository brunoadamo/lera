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


//comments--------------------------
Route::get('comment', 'CommentController@index');
Route::get('comment/{comment}', 'CommentController@show');
Route::get('comment/narrative/{id}', 'CommentController@showByIdNarrative');
Route::get('comment/user/{id}', 'CommentController@showByIdUser');
Route::get('comment/status/{id}', 'CommentController@showByStatus');
Route::post('comment', 'CommentController@store');
Route::put('comment/{comment}', 'CommentController@update');
Route::delete('comment/{comment}', 'CommentController@delete');

//rates--------------------------
Route::get('rate', 'RateController@index');
Route::get('rate/{rate}', 'RateController@show');
Route::get('rate/narrative/{id}', 'RateController@showByIdNarrative');
Route::get('rate/user/{id}', 'RateController@showByIdUser');
Route::get('rate/status/{id}', 'RateController@showByStatus');
Route::post('rate', 'RateController@store');
Route::put('rate/{rate}', 'RateController@update');
Route::delete('rate/{rate}', 'RateController@delete');