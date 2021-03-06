@extends('template.app')

@section('content')
    <section class="content-header">
      <h1>
        User
        <small> Index</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
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
              <a href="{{url('users/add')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah User</a>
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered display" id="show-data">
                <thead>
                  <tr>
                    <th style="width: 20px">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th style="width: 240px">Action</th>
                  </tr>
                </thead>
{{--
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($user as $row)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                      <a href="users/edit/{{$row->id}}" class="btn-sm btn-success">Edit</a>
                      <a onclick="return confirm('Are you sure to delete it?')" href="{{url('users/delete/'.$row->id)}}" class="btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody> --}}

              </table>

              {{-- {{$dataTable->table()}} --}}

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
{{--
{{$dataTable->scripts()}} --}}

<script type="text/javascript">
    $(function() {
        var oTable = $('#show-data').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ url("users") }}'
            },
            columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'action', name: 'action', orderable: false},
        ],
        });
    });
</script>
@endsection