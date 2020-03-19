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
                  <th style="width: 7%">Table</th>
                  <th style="width: 275px">User</th>
                  <th style="width: 15%">Date</th>
                  <th style="width: 25%">Total</th>
                </tr>

                @php
                $no = 1;
                @endphp
                {{-- @foreach($odr as $row) --}}
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$odr->table_number}}</td>
                  <td>{{$odr->usr->name}}</td>{{-- Dari function/method di model --}}
                  <td>{{$odr->date}}</td>
                  <td>
                    @php
                      $total = 0;

                      foreach($odr->owds as $tot) {
                        $total += $tot->total;
                      }
                      echo $total;
                    @endphp
                  </td>
                </tr>
                {{-- @endforeach --}}

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
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
                  <th style="width: 275px">Item</th>
                  <th style="width: 15%">Qty</th>
                  <th style="width: 25%">Total</th>
                </tr>

                @php
                $no = 1;
                @endphp
                @foreach($odr->owds as $row)
                <tr>
                  <td>{{$no++}}</td>
                  <td>{{$row->dwi->name}}</td>
                  <td>{{$row->qty}}</td>
                  <td>{{$row->total}}</td>
                </tr>
                @endforeach

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection