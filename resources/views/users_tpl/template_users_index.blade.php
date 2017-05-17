@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users List</div>
                <div class="panel-body">

                  <p>
                    <a href="{{ route('tambahUser') }}" class="btn btn-primary">Add User</a>
                  </p>

                  @if ( count( $users ) )

                  <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        @foreach( $users as $key )
                        <tr>
                          <td>{{ $key->username }}</td>
                          <td>{{ $key->full_name }}</td>
                          <td>{{ $key->email }}</td>
                          <td>{{ $key->role }}</td>
                          <td>{{ $key->status }}</td>
                          <td>
                            <a href="./users/{{ $key->id }}/edit" class="btn btn-xs btn-info">Edit</a>
                            <a href="{{ route('deleteUser', $key->id) }}" class="btn btn-xs btn-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>

                    </table>

                  </div><!-- table-responsive -->

                  {!! $users->links() !!}
                  <br>
                  {!! $users->render() !!}

                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
