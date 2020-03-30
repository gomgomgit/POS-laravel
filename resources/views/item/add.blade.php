@extends('template.app')

@section('content')

  <section class="content-header">
    <h1>
      Item
      <small> Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-bars"></i> Item</a></li>
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
              <h3 class="box-title">Item</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/item/store">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select type="text" class="form-control" id="category" name="category" placeholder="Enter category name">
          					@foreach($category as $cate)
          					<option value="{{$cate->id}}">{{$cate->name}}</option>
          					@endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="item">Name</label>
                  <input type="text" class="form-control" id="item" name="name" placeholder="Enter item name">
                  @if($errors->has('name'))
                      <div class="text-danger">
                          {{ $errors->first('name')}}
                      </div>
                  @endif
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" placeholder="Enter item price">
                </div>
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" placeholder="Enter item stock">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
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