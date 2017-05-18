@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New User</div>
                <div class="panel-body">

                  @include('layouts/errors')

                  {!! Form::open( ['method' => 'POST', 'route' => 'simpanUser', 'class' => 'form-horizontal'] ) !!}

                      @include('users_tpl/template_borang_users')

                  {!! Form::close() !!}

                </div>

                <div class="panel-footer">
                   <a href="{{ route('senaraiUser') }}" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
