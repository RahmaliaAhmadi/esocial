<?php

// Route untuk halaman utama sistem
Route::get('/', function () {
  return view('welcome');
});

// Route untuk proses authentication
Auth::routes();

// Route untuk halaman setelah login (member area)
Route::get('/home', 'HomeController@index')->name('home');

// Paparan profile
Route::get('profile/{username?}', function($username = 'John') {

  // Tetapan condition supaya username perlu diisi
  if ( is_null( $username ) )
  {
    return 'Sila dapatkan username bagi profile yang ingin dibuka.';
  }
  // Paparkan data apabila username dibekalkan
  return 'Username bagi profile ini adalah: ' . $username;

});


// Route pengurusan posts
Route::group( ['prefix' => 'posts'], function() {

  Route::get('/', function() {

    // Kita bagi arahan pada laravel supaya beri response
    // Paparkan template bernama template_posts_index.php
    // yang berada di dalam folder resources/views/posts_tpl
    return view('posts_tpl/template_posts_index');

  });

  Route::get('/{id}', function($id) {

    // paparkan template beserta dengan attachment variable $id
    return view('posts_tpl/template_posts_show', compact('id') );
    //return view('posts_tpl/template_posts_show', ['id' => $id]);

  });

  Route::get('/{id}/edit', function($id) {

    return view('posts_tpl/template_posts_edit', compact('id'));

  });

});
