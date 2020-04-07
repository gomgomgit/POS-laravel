@extends('template.app')

@section('content')

  <section class="content-header">
    <h1>
      Category
      <small>Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-bars"></i> Category</a></li>
      <li class="active"> Add</li>
    </ol>
  </section>

	<section class="content">
	  <div class="row">
	    <!-- right column -->
	    <div class="col-md-12">
	      <!-- Horizontal Form -->
	      <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Category</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="./store">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Name</label>
                  <input type="text" class="form-control" id="category" name="name" placeholder="Enter category name">
                </div>
                @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name')}}
                    </div>
                @endif
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
<script type="text/javascript">
  $(".product-menu").addClass('active menu-open');
  $(".product-dd").css('display', 'block');
  $(".category-menu").addClass('active menu-open');
</script>
@endsection