@extends('template.app')
@section('link')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('AdminLTE-2.4/plugins/iCheck/all.css')}}">
@endsection

@section('content')
  <section class="content-header">
    <h1>
      User
      <small> Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-users"></i> User</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

	<section class="content">
	  <div class="row">
	    <!-- right column -->
	    <div class="col-md-12">
	      <!-- Horizontal Form -->
	      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/users/update/{{$user->id}}">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{$user->name}}" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" value="{{$user->email}}" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Avatar</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label>
                    <input type="radio" name="role" value="1" class="role" {{$user->role == 1 ? 'checked' : ''}}>
                     Admin
                  </label>
                  <label>
                    <input type="radio" name="role" value="2" class="role" {{$user->role == 2 ? 'checked' : ''}}>
                     Staff
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
	      <!-- /.box -->
	    </div>
	    <!--/.col (right) -->
	  </div>
	  <!-- /.row -->
	</section>
@endsection

@section('script')
<script src="{{asset('AdminLTE-2.4/plugins/iCheck/icheck.min.js')}}"></script>

<script type="text/javascript">
  $(".user-menu").addClass('active menu-open');
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.role').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  })
</script>
@endsection