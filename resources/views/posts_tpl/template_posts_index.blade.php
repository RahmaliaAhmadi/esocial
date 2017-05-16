@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Halaman Senarai Posts</div>
                <div class="panel-body">

                  <p>Contoh Post 1 <a href="./posts/1" class="btn btn-xs btn-primary">View</a> <a href="./posts/1/edit" class="btn btn-xs btn-info">Edit</a></p>
                  <p>Contoh Post 2 <a href="./posts/2" class="btn btn-xs btn-primary">View</a> <a href="./posts/2/edit" class="btn btn-xs btn-info">Edit</a></p>
                  <p>Contoh Post 3 <a href="./posts/3" class="btn btn-xs btn-primary">View</a> <a href="./posts/3/edit" class="btn btn-xs btn-info">Edit</a></p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
