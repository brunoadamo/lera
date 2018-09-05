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

// home--------------------------
Route::get('/', function () {
    return view('pages.home');
});
Route::get('/home', function () {
    return view('pages.home');
});
Route::resource('/', 'HomeController');
Route::resource('/home', 'HomeController');
// home--------------------------

// narratives-------------
Route::get('/narratives', function () {
    return view('pages.narratives');
});
Route::get('/narrative/{narrative}', 'NarrativeController@single'); //singl page post
// narratives-------------

// narratives-------------

Route::resource('narratives','NarrativeController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Route::resource('/', 'NarrativeController');
    Route::resource('/narratives', 'NarrativeController');
    Route::resource('/acts', 'ActController');
    // Route::put('/narratives/{narrative}/publish', 'NarrativeController@publish')->middleware('admin');
});


Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::get('/portfolio', 'PortfolioController@index');

Auth::routes();

