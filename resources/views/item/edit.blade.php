@extends('template.app')

@section('content')

  <section class="content-header">
    <h1>
      Item
      <small> Edit</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-bars"></i> Item</a></li>
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
              <h3 class="box-title">Item</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="/item/update/{{$item->id}}">
              @csrf
              @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="category">Category</label>
                  <select type="text" class="form-control" id="category" name="category" placeholder="Enter category name">
          					@foreach($category as $cate)
          					<option value="{{$cate->id}}"
          						@if($cate->id == $item->category_id) selected="selected" @endif
          					>
          						{{$cate->name}}
          					</option>
          					@endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="item">Name</label>
                  <input type="text" class="form-control" id="item" name="name" value="{{$item->name}}" placeholder="Enter item name">
                </div>
                <div class="form-group">
                  <label for="price">Price</label>
                  <input type="number" class="form-control" id="price" name="price" value="{{$item->price}}" placeholder="Enter item price">
                </div>
                <div class="form-group">
                  <label for="stock">Stock</label>
                  <input type="text" class="form-control" id="stock" name="stock" value="{{$item->stock}}" placeholder="Enter item stock">
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