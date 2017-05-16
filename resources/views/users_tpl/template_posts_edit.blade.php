@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Post <?php echo $id; ?></div>
                <div class="panel-body">

                  <form class="form-horizontal" role="form">
                      {{ csrf_field() }}

                      <div class="form-group">
                          <label for="content" class="col-md-4 control-label">Post</label>

                          <div class="col-md-6">
                              <textarea name="content" class="form-control"></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-md-8 col-md-offset-4">
                              <button type="submit" class="btn btn-primary">
                                  Update
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

@section('script')
<script>
alert('test');
</script>
@endsection
