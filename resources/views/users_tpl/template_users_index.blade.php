@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Users List</div>
                <div class="panel-body">

                  @include('layouts/errors')

                  <p>
                    <a href="{{ route('tambahUser') }}" class="btn btn-primary">Add User</a>
                  </p>

                  <div class="table-responsive">

                    <table id="users-table" class="table table-bordered table-hover">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Full Name</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                    </table>

                  </div><!-- table-responsive -->

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>

<script>
  $(function() {
        $('#users-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('datatablesUser') }}',

            columns: [
              {data: 'id', name: 'id'},
              {data: 'username', name: 'username'},
              {data: 'full_name', name: 'full_name'},
              {data: 'email', name: 'email'},
              {data: 'role', name: 'role'},
              {data: 'status', name: 'status'},
              {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    });
</script>
@endsection
