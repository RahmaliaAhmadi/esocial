<div class="form-group">
    <label for="username" class="col-md-4 control-label">Username</label>

    <div class="col-md-6">
        <!--input type="text" name="username" placeholder="User username" class="form-control" value=""-->
        {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
    </div>
</div>

<div class="form-group">
    <label for="email" class="col-md-4 control-label">Email</label>

    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
    </div>
</div>

<div class="form-group">
    <label for="password" class="col-md-4 control-label">Password</label>

    <div class="col-md-6">
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
    </div>
</div>

<div class="form-group">
    <label for="full_name" class="col-md-4 control-label">Full Name</label>

    <div class="col-md-6">
      {!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
    </div>
</div>

<div class="form-group">
    <label for="phone" class="col-md-4 control-label">Phone</label>

    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
    </div>
</div>

<div class="form-group">
    <label for="address" class="col-md-4 control-label">Address</label>

    <div class="col-md-6">
        {!! Form::textarea('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
    </div>
</div>

<div class="form-group">
    <label for="content" class="col-md-4 control-label">Picture</label>

    <div class="col-md-6">
        {!! Form::file('picture') !!}
    </div>
</div>

@if ( Auth::user()->role == 'admin')

<div class="form-group">
    <label for="role" class="col-md-4 control-label">Role</label>

    <div class="col-md-6">
      {!! Form::select('role', ['user' => 'User', 'admin' => 'Admin'], null, ['class' => 'form-control', 'placeholder' => '-- Sila Pilih Role --']) !!}
    </div>
</div>

<div class="form-group">
    <label for="status" class="col-md-4 control-label">Status</label>

    <div class="col-md-6">
      {!! Form::select('status', ['pending' => 'Pending', 'active' => 'Active', 'banned' => 'Banned'], null, ['class' => 'form-control', 'placeholder' => '-- Sila Pilih Status --']) !!}
    </div>
</div>

@endif

<div class="form-group">
    <div class="col-md-8 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </div>
</div>
