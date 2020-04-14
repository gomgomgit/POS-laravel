@extends('template.app')
@section('link')
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('AdminLTE-2.4/plugins/iCheck/all.css')}}">
@endsection

@section('content')
  <section class="content-header">
    <h1>
      User
      <small> Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-users"></i> User</a></li>
      <li class="active">Add</li>
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
            <form role="form" method="post" action="/users/store">
              @csrf
              <div class="box-body">
                <div class="bg-danger p-1">
                    @foreach($errors->all() as $error)
                      <p>{{$error}}</p>
                    @endforeach
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" value="{{old('name')}}" class="form-control" id="email" name="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" value="{{old('name')}}" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Avatar</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label>
                    <input type="radio" name="role" value="1" class="role">
                     Admin
                  </label>
                  <label>
                    <input type="radio" name="role" value="2" class="role" checked>
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

<!-- iCheck 1.0.1 -->
<script src="{{asset('AdminLTE-2.4/plugins/iCheck/icheck.min.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.role').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })
  })
</script>
@endsection