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
Route::get('/create', function () {
    return view('admin.narratives.create');
});

Route::resource('narratives','NarrativeController');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    // Route::resource('/', 'NarrativeController');
    // Route::resource('/narratives', 'NarrativeController');
    // Route::put('/narratives/{narrative}/publish', 'NarrativeController@publish')->middleware('admin');
});

Auth::routes();

Route::resource('/profile', 'HomeController@index')->middleware('admin');

