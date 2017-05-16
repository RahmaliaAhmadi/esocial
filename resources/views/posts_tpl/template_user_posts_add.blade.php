@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">

                  <form class="form-horizontal" role="form" action="../" method="POST">
                      <input type="hidden" name="_method" value="PATCH">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="address" class="col-md-4 control-label">Content</label>

                          <div class="col-md-6">
                              <textarea name="content" class="form-control" placeholder="Enter your content"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="status" class="col-md-4 control-label">Status</label>

                          <div class="col-md-6">
                            <select name="status" class="form-control">
                              <option value="draft">Draft</option>
                              <option value="published">Published</option>
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
                   <a href="../" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
