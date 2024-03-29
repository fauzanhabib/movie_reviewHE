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

Route::get('/', 'HomeController@homeWelcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/list', 'MoviesController@index')->name('list');

//Route::post('movies', 'MoviesController@store')->name('movies.store');
Route::resource('movies','MoviesController');
Route::get('/review/{id}', 'MoviesController@review_movie')->name('review_movie');
Route::post('/comment','MoviesController@comment')->name('comment');
