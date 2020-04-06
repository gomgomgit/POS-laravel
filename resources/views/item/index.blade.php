@extends('template.app')

@section('content')

      <section class="content-header">
        <h1>
          Item
          <small> Index</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Item</li>
        </ol>
      </section>

	    <section class="content">
      <div class="row">
        <div class="col-md-12">
          @if(session('message'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Alert!</h4>
              {{session('message')}}
            </div>
          @endif
          <div class="box">
            <div class="box-header with-border">
              <a href="{{url('item/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Item</a>
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">No</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th style="width: 170px">Price</th>
                  <th style="width: 100px">Stock</th>
                  <th style="width: 250px">Action</th>
                </tr>

                @php
                $no = 1;
                @endphp
                @foreach($item as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->cate->name}}</td>{{-- Dari function/method di model --}}
                  <td>Rp. {{number_format($row->price, 2, "," , ".")}}</td>
                  <td>{{$row->stock}}</td>
                  <td>
                    <a href="item/edit/{{$row->id}}" class="btn-sm btn-success">Edit</a>
                    <a onclick="return confirm('are you sure to delete it?')" href="{{url('item/delete/'.$row->id)}}" class="btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection