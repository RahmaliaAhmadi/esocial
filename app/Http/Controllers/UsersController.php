<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

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
          return '
          <a href="'. route('editUser', $user->id) .'" class="btn btn-xs btn-primary">Edit</a>

          <!-- Button trigger delete modal -->
          <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-'.$user->id.'">
            Delete
          </button>

          <!-- Mula Modal Delete -->
          <div class="modal fade" id="delete-'.$user->id.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">Pengesahan Hapus Data '.$user->full_name.'</h4>
                </div>
                <div class="modal-body">
                  Adakah anda bersetuju untuk menghapuskan '.$user->full_name.' ?
                </div>
                <div class="modal-footer">

                  <form method="POST" action="'.route('deleteUser', $user->id).'">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="_token" value='.csrf_token().'>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger">Confirm</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
          <!-- Tamat Modal Delete -->

          ';
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

      // Dapatkan semua data dari borang edit kecuali yang dinyatakan
      $data = $request->except(['password', 'picture']);

      // Lakukan semakan terhadap input picture. Adakah fail untuk diupload wujud>?
      if( $request->hasFile('picture') )
      {
        // Tetapkan syarat supaya fail yang diupload adalah valid
        if ( $request->file('picture')->isValid() )
        {
          // Dapatkan nama asal fail yang diupload
          //$original_pic_name = $request->picture->getClientOriginalName();
          // Tetapkan lokasi untuk simpanan fail yang ingin diupload ini.
          //$path = $request->picture->storeAs('images', $original_pic_name);
          $path = $request->picture->store('images');
          // Attach array picture kepada variable $data untuk simpanan nama fail ke table users
          $data['picture'] = $path;
        }
      }

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
      $user = Auth::user();

      return view('users_tpl/template_profile_edit', compact('user') );

    }

    public function updateProfile( Request $request )
    {
      $user = Auth::user();

      // Validasi data
      $this->validate( $request, [
          'username' => 'required|min:3|alpha_dash|unique:users,username,' . $user->id,
          'email' => 'required|email|unique:users,email,' . $user->id,
          'full_name' => 'required'
      ] );

      // Dapatkan semua data dari borang edit kecuali yang dinyatakan
      $data = $request->except(['password', 'picture']);

      // Lakukan semakan terhadap input picture. Adakah fail untuk diupload wujud>?
      if( $request->hasFile('picture') )
      {
        // Tetapkan syarat supaya fail yang diupload adalah valid
        if ( $request->file('picture')->isValid() )
        {
          // Dapatkan nama asal fail yang diupload
          //$original_pic_name = $request->picture->getClientOriginalName();
          // Tetapkan lokasi untuk simpanan fail yang ingin diupload ini.
          //$path = $request->picture->storeAs('images', $original_pic_name);
          $path = $request->picture->store('images');
          // Attach array picture kepada variable $data untuk simpanan nama fail ke table users
          $data['picture'] = $path;
        }
      }

      // Semak adakah password ingin ditukar (field tak kosong)
      // Jika ruangan password tidak kosong, attach array password
      // dan data password yang diencrypt ke variable $data
      if( ! empty( $request->input('password') ) )
      {
        $data['password'] = bcrypt( $request->input('password') );
      }

      // Simpan data ke dalam database
      // DB::table('users')->where('id', '=', $id)->update($data);
      User::find( $user->id )->update($data);
      // Bagi response dengan cara redirect ke senarai user
      return redirect()->route('editProfile')->with('alert-success', 'Profile berjaya dikemaskini!');

    }
}
