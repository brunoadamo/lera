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
    return view('pages.home');
});
Route::get('/home', function () {
    return view('pages.home');
});
Route::get('/narratives', function () {
    return view('pages.narratives');
});

Route::resource('narratives','NarrativeController');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    
    Route::resource('/', 'NarrativeController');
    Route::resource('/narratives', 'NarrativeController');
    Route::put('/narratives/{narrative}/publish', 'NarrativeController@publish')->middleware('admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
