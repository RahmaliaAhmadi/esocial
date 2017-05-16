<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = null;

      // Kita bagi arahan pada laravel supaya beri response
      // Paparkan template bernama template_posts_index.php
      // yang berada di dalam folder resources/views/posts_tpl
      return view('posts_tpl/template_admin_posts_index', compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function newsfeed()
    {

      $posts = null;

      // Kita bagi arahan pada laravel supaya beri response
      // Paparkan template bernama template_posts_index.php
      // yang berada di dalam folder resources/views/posts_tpl
      return view('posts_tpl/template_user_posts_index', compact('posts'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return redirect('/newsfeed')->with('alert-success', 'Thank you for posting!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      // paparkan template beserta dengan attachment variable $id
      return view('posts_tpl/template_posts_show', compact('id') );
      //return view('posts_tpl/template_posts_show', ['id' => $id]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      return view('posts_tpl/template_posts_edit', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('posts');
    }
}
