<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// Panggil Model yang diperlukan
use App\Models\User;
use Datatables;

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
      // $users = DB::table('users')
      // //->where('email', '=', 'admin@gmail.com')
      // //->orderBy('id', 'desc')
      // //->get();
      // //->select('id', 'username')
      // //->get();
      // ->paginate(3);

      // $users = User::paginate(3);

      return view('users_tpl/template_users_index');
    }

    public function datatables()
    {
      $users = User::select([
        'id',
        'username',
        'email',
        'full_name',
        'role',
        'status'
      ]);

      return Datatables::of($users)
      ->addColumn('action', function ($user) {
          return '<a href="'. route('editUser', $user->id) .'" class="btn btn-xs btn-primary">Edit</a>
          <a href="'. route('deleteUser', $user->id) .'" class="btn btn-xs btn-danger">Delete</a>';
      })
      ->make(true);
    }

    public function posts($id)
    {
      // Dapatkan maklumat user
      // $user = DB::table('users')->where('id', $id)->first();
      // Dapatkan senarai post dari user yang terlibat
      // $posts = DB::table('posts')->where('user_id', $id)->paginate(3);
      // Dapatkan maklumat user menerusi MODEL
      $user = User::find($id);

      return view('users_tpl/template_admin_users_posts', compact('user') );
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
      $data = $request->except(['password']);
      // Encrypt password
      $data['password'] = bcrypt( $request->input('password') );
      // Simpan data ke dalam database
      User::create($data);

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
      // $user = DB::table('users')->where('id', '=', $id)->first();
      $user = User::find($id);

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
      // $data = $request->only([
      //   'username',
      //   'email',
      //   'full_name',
      //   'phone',
      //   'address',
      //   'role',
      //   'status',
      //   'picture'
      // ]);

      $data = $request->except(['password']);

      // Semak adakah password ingin ditukar (field tak kosong)
      // Jika ruangan password tidak kosong, attach array password
      // dan data password yang diencrypt ke variable $data
      if( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      // Simpan data ke dalam database
      // DB::table('users')->where('id', '=', $id)->update($data);
      User::find($id)->update($data);
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
      //$user = DB::table('users')->where('id', '=', $id);

      // Dan hapuskan data
      // $user->delete();
      User::find($id)->delete();

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
