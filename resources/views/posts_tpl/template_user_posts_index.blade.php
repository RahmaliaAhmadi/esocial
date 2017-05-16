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
                              <textarea name="content" class="form-control" placeholder="Write something..."></textarea>
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

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posted on 16 May 2017</div>
                <div class="panel-body">

                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pharetra fermentum nisi, sit amet eleifend nisl congue sit amet. Vivamus a congue ante. Nulla accumsan euismod posuere. Vivamus eget nisl diam. Nam vel convallis elit, vel iaculis nunc. Vestibulum scelerisque elit et lacus pellentesque convallis. Phasellus dignissim mollis dolor, nec sagittis turpis pharetra ac. Quisque efficitur lectus arcu, non feugiat quam euismod sed. Cras in enim metus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean nec ante ultricies, vestibulum turpis ut, lacinia lectus. Vivamus vitae ullamcorper enim. Pellentesque ultricies et orci in ullamcorper.</p>

                  <p>Maecenas est justo, pretium ut ultrices et, pellentesque eget arcu. Morbi ut lacus purus. Sed rhoncus laoreet nisi, vel congue est venenatis nec. Integer ullamcorper ex id velit gravida consectetur. Mauris quis auctor metus, quis porttitor elit. Maecenas vel diam id risus pretium tincidunt. Donec pretium massa et mi pellentesque, sit amet commodo ante egestas. Quisque fringilla ac dui sit amet faucibus. Etiam dolor nisl, molestie nec ornare eget, tincidunt ac urna. Nulla facilisi.</p>

                  <p>Proin in ex tempus, facilisis justo non, dignissim nunc. Duis imperdiet nisl quis urna consequat mattis. Curabitur ullamcorper odio in tempus ornare. Morbi bibendum luctus purus, at tempus velit euismod eget. Donec elementum velit erat, sed ullamcorper ipsum rhoncus sit amet. In condimentum tempor molestie. Praesent velit neque, interdum at lectus eu, tempus rhoncus sem.</p>

                  <p>Etiam lacinia eu eros interdum rhoncus. Phasellus fermentum quis orci et mollis. Proin rutrum commodo consectetur. Nunc tortor urna, molestie a laoreet sit amet, commodo a ipsum. Proin commodo sem at mi venenatis faucibus. Aliquam placerat vel nisi in mollis. Pellentesque pulvinar efficitur consequat. Donec bibendum mauris egestas, commodo erat sed, interdum odio. Ut molestie ex diam, eu hendrerit neque sagittis vulputate. In tristique magna non turpis placerat sagittis. Duis rutrum consectetur ultrices. Donec turpis risus, pretium a commodo vitae, aliquet nec lacus. Sed porta est vitae accumsan faucibus.</p>

                  <p>Nam vel mi vitae ligula dignissim lobortis id nec urna. Mauris et velit nec nisl consectetur eleifend. Vestibulum a enim semper, volutpat erat non, rhoncus turpis. Suspendisse a neque a augue convallis pharetra. Suspendisse malesuada convallis turpis. Nulla pharetra commodo pretium. Fusce venenatis quam ut lacus luctus euismod. Maecenas ornare id purus ut venenatis. Proin feugiat arcu vitae tristique sollicitudin. Donec justo lorem, dignissim ornare interdum vulputate, dignissim sed nibh. Mauris tincidunt lacus a velit molestie ullamcorper iaculis nec felis. Donec pulvinar id velit a efficitur. Pellentesque ultricies lacus id sem dapibus tincidunt commodo ut mauris.</p>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
