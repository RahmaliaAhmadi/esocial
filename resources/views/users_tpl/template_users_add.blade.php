@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">

                  @include('layouts/errors')

                  <form class="form-horizontal" role="form" action="" method="POST">
                      {{ csrf_field() }}

                      <div class="form-group{!! $errors->first('username', ' has-error') !!}">
                          <label for="username" class="col-md-4 control-label">Username</label>

                          <div class="col-md-6">
                              <input type="text" name="username" placeholder="User username" class="form-control">
                              {!! $errors->first('username', '<span class="help-block">:message</span>') !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="email" class="col-md-4 control-label">Email</label>

                          <div class="col-md-6">
                              <input type="email" name="email" placeholder="User email" class="form-control">
                              {!! $errors->first('email') !!}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password" class="col-md-4 control-label">Password</label>

                          <div class="col-md-6">
                              <input type="password" name="password" placeholder="User password" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="full_name" class="col-md-4 control-label">Full Name</label>

                          <div class="col-md-6">
                              <input type="text" name="full_name" placeholder="User full name" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="phone" class="col-md-4 control-label">Phone</label>

                          <div class="col-md-6">
                              <input type="text" name="phone" placeholder="User phone" class="form-control">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="address" class="col-md-4 control-label">Address</label>

                          <div class="col-md-6">
                              <textarea name="address" class="form-control" placeholder="User address"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Picture</label>

                          <div class="col-md-6">
                              <input type="file" name="picture">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="role" class="col-md-4 control-label">Role</label>

                          <div class="col-md-6">
                              <select name="role" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                              </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="status" class="col-md-4 control-label">Status</label>

                          <div class="col-md-6">
                            <select name="status" class="form-control">
                              <option value="pending">Pending</option>
                              <option value="active">Active</option>
                              <option value="banned">Banned</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Save
                              </button>
                          </div>
                      </div>
                  </form>

                </div>

                <div class="panel-footer">
                   <a href="{{ route('senaraiUser') }}" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
