@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts List</div>
                <div class="panel-body">

                  @if( count( $posts ) )

                  <div class="table-responsive">

                    <table class="table table-bordered table-hover">

                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Writer</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>

                        @foreach( $posts as $key )
                        <tr>
                          <td>{{ $key->title }}</td>
                          <td>{{ $key->content }}</td>
                          <td>{{ $key->user->full_name }}</td>
                          <td>{{ $key->status }}</td>
                          <td>
                            <a href="{{ route('editPost', $key->id) }}" class="btn btn-xs btn-info">Edit</a>
                            <a href="#" class="btn btn-xs btn-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>

                    </table>

                  </div><!-- table-responsive -->

                  @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
