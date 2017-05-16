@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Users List</div>
                <div class="panel-body">

                  <p>
                    <a href="./users/add" class="btn btn-primary">Add User</a>
                  </p>
                  
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

                        <tr>
                          <td>admin</td>
                          <td>Ahmad Albab</td>
                          <td>ahmad@albab.com</td>
                          <td>admin</td>
                          <td>active</td>
                          <td>
                            <a href="./users/1/edit" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td>user</td>
                          <td>Ali Baba</td>
                          <td>ali@baba.com</td>
                          <td>user</td>
                          <td>active</td>
                          <td>
                            <a href="./users/2/edit" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                          </td>
                        </tr>

                      </tbody>

                    </table>

                  </div><!-- table-responsive -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
