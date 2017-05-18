<?php

// Route untuk halaman utama sistem
Route::get('/', function () {
  return view('welcome');
  // return bcrypt('passwordabc123');
});

// Route untuk proses authentication
Auth::routes();

// Route untuk halaman setelah login (member area)
Route::get('/home', 'HomeController@index')->name('home');

// Route pengurusan posts
Route::group( ['prefix' => 'posts', 'middleware' => 'auth'], function() {

  Route::get('/', 'PostsController@index');

  Route::get('/{id}', 'PostsController@show');

  Route::get('/{id}/edit', 'PostsController@edit');

});

// Route pengurusan users oleh admin
Route::group( ['prefix' => 'users'], function() {

  Route::get('/', 'UsersController@index')->name('senaraiUser');
  Route::get('/datatables', 'UsersController@datatables')->name('datatablesUser');
  Route::get('/add', 'UsersController@create')->name('tambahUser');
  Route::post('/add', 'UsersController@store')->name('simpanUser');
  Route::get('/{id}/edit', 'UsersController@edit')->name('editUser');
  Route::patch('/{id}', 'UsersController@update')->name('updateUser');
  Route::get('/{id}/delete', 'UsersController@destroy')->name('deleteUser');
  Route::get('/{id}/posts', 'UsersController@posts')->name('userPosts');

});

// Route pengurusan users oleh admin
Route::group( ['prefix' => 'posts'], function() {

  Route::get('/', 'PostsController@index')->name('indexPosts');
  Route::get('/{id}/edit', 'PostsController@edit')->name('editPost');
  Route::patch('/{id}', 'PostsController@update')->name('updatePost');
  Route::delete('/{id}', 'PostsController@destroy')->name('deletePost');

});

// Route pengurusan profile oleh user
Route::get('/profile', 'UsersController@userProfile');
Route::patch('/profile', 'UsersController@updateProfile');

// Papar profile user
Route::get('/profile/{username}', 'UsersController@show');


Route::get('/newsfeed', 'PostsController@newsfeed');
Route::post('/newsfeed', 'PostsController@store');
Route::get('/newsfeed/{id}', 'PostsController@show');
Route::get('/newsfeed/{id}/edit', 'PostsController@edit');
Route::patch('/newsfeed/{id}', 'PostsController@update');
