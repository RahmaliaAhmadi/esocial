<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // Panggil kesemua data dari table users
      $users = DB::table('users')
      //->where('email', '=', 'admin@gmail.com')
      //->orderBy('id', 'desc')
      //->get();
      //->select('id', 'username')
      //->get();
      ->paginate(3);

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
          'username' => 'required|min:3|alpha_dash|unique:users,username',
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:3',
          'full_name' => 'required'
      ] );

      // Dapatkan semua input yang ingin disimpan
      // $data = $request->all();
      $data = $request->only([
        'username',
        'email',
        'full_name',
        'phone',
        'address',
        'role',
        'status',
        'picture'
      ]);

      $data['password'] = bcrypt( $request->input('password') );

      // Simpan data ke dalam database
      DB::table('users')->insert($data);
      // DB::table('users')->insert([
      //   'username' => $request->input('username'),
      //   'email' => $request->input('email'),
      //   'password' => bcrypt( $request->input('password') ),
      //   'full_name' => $request->input('full_name'),
      //   'phone' => $request->input('phone'),
      //   'address' => $request->input('address'),
      //   'role' => $request->input('role'),
      //   'status' => $request->input('status'),
      //   'picture' => $request->input('picture')
      // ]);

      // Redirect ke senarai user
      return redirect()->route('senaraiUser');
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
      $user = DB::table('users')->where('id', '=', $id)->first();
      // $user = DB::table('users')->find($id);

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
      // Validasi data
      $this->validate( $request, [
          'username' => 'required|min:3|alpha_dash|unique:users,username,' . $id,
          'email' => 'required|email|unique:users,email,' . $id,
          'full_name' => 'required'
      ] );

      // Dapatkan semua input yang ingin disimpan
      // $data = $request->all();
      $data = $request->only([
        'username',
        'email',
        'full_name',
        'phone',
        'address',
        'role',
        'status',
        'picture'
      ]);

      // Semak adakah password ingin ditukar (field tak kosong)
      // Jika ruangan password tidak kosong, attach array password
      // dan data password yang diencrypt ke variable $data
      if( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      // Simpan data ke dalam database
      DB::table('users')->where('id', '=', $id)->update($data);

      // Bagi response dengan cara redirect ke senarai user
      return redirect()->route('senaraiUser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // Cari ID yang ingin dihapuskan
      $user = DB::table('users')->where('id', '=', $id);

      // Dan hapuskan data
      $user->delete();

      // Redirect ke halaman senarai users
      return redirect()->route('senaraiUser');
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
