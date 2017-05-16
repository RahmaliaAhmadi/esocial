@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">

                  <form class="form-horizontal" role="form" action="" method="POST">
                      <input type="hidden" name="_method" value="PATCH">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Username</label>

                          <div class="col-md-6">
                              <input type="text" name="username" placeholder="Your username" class="form-control" value="{{ $user['username'] }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Email</label>

                          <div class="col-md-6">
                              <input type="email" name="email" placeholder="Your email" class="form-control" value="{{ $user['email'] }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input type="password" name="password" placeholder="Your password" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Full Name</label>

                          <div class="col-md-6">
                              <input type="text" name="full_name" placeholder="Your full name" class="form-control" value="{{ $user['full_name'] }}">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Phone</label>

                          <div class="col-md-6">
                              <input type="text" name="phone" placeholder="Your phone" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Address</label>

                          <div class="col-md-6">
                              <textarea name="address" class="form-control" placeholder="Your address"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Picture</label>

                          <div class="col-md-6">
                              <input type="file" name="picture">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
                              </button>
                          </div>
                      </div>
                  </form>

                </div>

                <div class="panel-footer">
                   <a href="../" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
