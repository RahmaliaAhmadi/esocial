@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Paparan Post</div>
                <div class="panel-body">

                  <p>Contoh Post {{ $id }}</p>

                </div>

                <div class="panel-footer">
                   <a href="./" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
