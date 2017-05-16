<?php

// Route untuk halaman utama sistem
Route::get('/', function () {
  return view('welcome');
});

// Route untuk proses authentication
Auth::routes();

// Route untuk halaman setelah login (member area)
Route::get('/home', 'HomeController@index')->name('home');

// Route pengurusan posts
Route::group( ['prefix' => 'posts'], function() {

  Route::get('/', 'PostsController@index');

  Route::get('/{id}', 'PostsController@show');

  Route::get('/{id}/edit', 'PostsController@edit');

});

// Route pengurusan users oleh admin
Route::group( ['prefix' => 'users'], function() {

  Route::get('/', 'UsersController@index');
  Route::get('/add', 'UsersController@create');
  Route::post('/add', 'UsersController@store');
  Route::get('/{id}/edit', 'UsersController@edit');
  Route::patch('/{id}', 'UsersController@update');
  Route::delete('/{id}', 'UsersController@destroy');

});

// Route pengurusan profile oleh user
Route::get('/profile', 'UsersController@userProfile');
Route::patch('/profile', 'UsersController@updateProfile');

// Papar profile user
Route::get('/profile/{username}', 'UsersController@show');
