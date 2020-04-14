@extends('template.app')

@section('content')
    <section class="content-header">
      <h1>
        Order
        <small> Index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
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
              <a href="{{url('orders/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Order</a>
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="show-data">
                <thead>
                  <tr>
                    <th style="width: 20px">Id</th>
                    <th style="width: 7%">Table</th>
                    <th style="width: 275px">User</th>
                    <th style="width: 15%">Date</th>
                    <th style="width: 25%">Total</th>
                    <th style="width: 120px">Details</th>
                    <th style="width: 240px">Action</th>
                  </tr>
                </thead>

{{--                 @php
                $no = 1;
                @endphp
                @foreach($owd as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->table_number}}</td>
                  <td>{{$row->usr->name}}</td>
                  <td>{{$row->date}}</td>
                  <td>
                    @php
                      $total = 0;

                      foreach($row->owds as $tot) {
                        $total += $tot->total;
                      }
                      echo "Rp. ". number_format($total, 2, ",", ".");
                    @endphp
                  </td>
                  <td>
                    <a href="orders/details/{{$row->id}}" class="btn-sm btn-primary">Details</a>
                  </td>
                  <td>
                    <a href="orders/edit/{{$row->id}}" class="btn-sm btn-success">Edit</a>
                    <a onclick="return confirm('Are you sure to delete it?')" href="{{url('orders/delete/'.$row->id)}}" class="btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @endforeach --}}

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

@section('script')
<script type="text/javascript">
    $(function() {
        var oTable = $('#show-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("orders") }}'
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'table_number', name: 'table_number'},
            {data: 'user', name: 'user'},
            {data: 'date', name: 'date'},
            {data: 'total', name: 'total'},
            {data: 'detail', name: 'detail'},
            {data: 'action', name: 'action', orderable: false},
            // {data: 'kategori', name: 'kategori', orderable: false, searchable: false},
        ],
        });
    });
</script>
@endsection