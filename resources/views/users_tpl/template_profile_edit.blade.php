@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">

                  @include('layouts/errors')

                  @if ( $user->picture != '' )
                  <p><img src="{{ asset($user->picture) }}" class="img-responsive center-block img-thumbnail"></p>
                  @endif

                  {!! Form::model( $user, ['method' => 'PATCH', 'route' => 'updateProfile', 'class' => 'form-horizontal', 'files' => true] ) !!}

                      @include('users_tpl/template_borang_users')

                  {!! Form::close() !!}

                </div>

                <div class="panel-footer">
                   <a href="../" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
