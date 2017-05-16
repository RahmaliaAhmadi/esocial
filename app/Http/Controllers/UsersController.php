<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = null;

        return view('users_tpl/template_users_index', compact('users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('users_tpl/template_users_add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // Validasi data
      $this->validate( $request, [
          'username' => 'required|min:3|alpha_dash',
          'password' => 'required|min:3',
          'email' => 'required|email',
          'full_name' => 'required'
      ] );


      $data = $request->all();

      // return $data;
      dd($data);
      //return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $user = $username;

        return view('users_tpl/template_users_show', compact('user') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = $id;

      return view('users_tpl/template_users_edit', compact('user') );
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
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = $id;

      return redirect('users');
    }

    public function userProfile()
    {

      $user = array('username' => 'admin', 'full_name' => 'Ahmad', 'email' => 'sample@gmail.com');

      return view('users_tpl/template_profile_edit', compact('user') );

    }

    public function updateProfile()
    {

      return redirect('/');

    }
}
