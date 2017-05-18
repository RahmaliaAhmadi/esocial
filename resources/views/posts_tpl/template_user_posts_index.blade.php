@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Post</div>
                <div class="panel-body">

                  @if (session('alert-success'))
                      <div class="alert alert-success">
                          {{ session('alert-success') }}
                      </div>
                  @endif

                  <form class="form-horizontal" role="form" action="newsfeed" method="POST">
                      {{ csrf_field() }}

                      <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" name="title" class="form-control" placeholder="Your post title...">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                            <textarea name="content" class="form-control" placeholder="Write something..."></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-md-12">
                          <select name="status" class="form-control">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-12">
                              <button type="submit" class="btn btn-primary">
                                  Post
                              </button>
                          </div>
                      </div>
                  </form>

                </div>
            </div>
        </div>
    </div>
</div>

@if ( count( $user->posts ) )

@foreach( $user->posts as $key )
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $key->title }}</div>
                <div class="panel-body">

                  {!! $key->content !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endforeach



@endif

@endsection
