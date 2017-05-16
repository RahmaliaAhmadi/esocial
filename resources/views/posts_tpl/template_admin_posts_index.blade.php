@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts List</div>
                <div class="panel-body">

                  <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                      <thead>
                        <tr>
                          <th>Content</th>
                          <th>Username</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        <tr>
                          <td>Sample Post 1</td>
                          <td>admin</td>
                          <td>Ahmad Albab</td>
                          <td>Published</td>
                          <td>
                            <a href="./posts/1/edit" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                          </td>
                        </tr>

                        <tr>
                          <td>Sample Post 2</td>
                          <td>user</td>
                          <td>Ali Baba</td>
                          <td>Draft</td>
                          <td>
                            <a href="./posts/2/edit" class="btn btn-xs btn-info">Edit</a>
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
