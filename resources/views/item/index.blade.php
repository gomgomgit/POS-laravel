@extends('template.app')

@section('content')

	    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Item</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">No</th>
                  <th style="width: 25%">Name</th>
                  <th style="width: 175px">Category</th>
                  <th style="width: 25%">Price</th>
                  <th style="width: 15%">Stock</th>
                  <th style="width: 120px">Edit</th>
                  <th style="width: 120px">Delete</th>
                </tr>

                @php
                $no = 1;
                @endphp
                @foreach($item as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->cate->name}}</td>{{-- Dari function/method di model --}}
                  <td>{{$row->price}}</td>
                  <td>{{$row->stock}}</td>
                  <td>
                    <a href="item/edit/{{$row->id}}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <a href="{{url('item/delete/'.$row->id)}}" class="btn btn-danger">Delete</a>
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
              <div>
                <a href="{{url('item/add')}}" class="btn btn-primary">Tambah Item</a>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection