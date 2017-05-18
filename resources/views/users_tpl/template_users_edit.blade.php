@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit User {{ $user->full_name }}</div>
                <div class="panel-body">

                  <img src="{{ asset($user->picture) }}">

                  @include('layouts/errors')

                  {!! Form::model( $user, ['method' => 'PATCH', 'route' => ['updateUser', $user->id], 'class' => 'form-horizontal', 'files' => true] ) !!}

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
