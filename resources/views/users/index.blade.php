@extends('template.app')

@section('content')

	    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 20px">No</th>
                  <th style="width: 40%">Name</th>
                  <th style="width: 40%">Email</th>
                  <th style="width: 220px">Edit</th>
                  <th style="width: 220px">Delete</th>
                </tr>

                @php
                $no = 1;
                @endphp
                @foreach($user as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->name}}</td>
                  <td>{{$row->email}}</td>
                  <td>
                    <a href="users/edit/{{$row->id}}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <a href="{{url('users/delete/'.$row->id)}}" class="btn btn-danger">Delete</a>
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
                <a href="{{url('users/add')}}" class="btn btn-primary">Tambah User</a>
              </div>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection