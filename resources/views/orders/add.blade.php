@extends('template.app')

@section('content')

	<section class="content">
	  <div class="row">
	    <!-- right column -->
	    <div class="col-md-12">
	      <!-- Horizontal Form -->
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              @php
                $no = 1;
              @endphp
              @foreach($cwis as $ct)
                <li class=""><a href="{{'#tab_'.$no++}}" data-toggle="tab"><h3 class="font-weight-bold px-3">{{$ct->name}}</h3></a></li>
              @endforeach
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                @php
                  $no = 1;
                @endphp
                @foreach($cwis as $itempercategory)
                  <div class="tab-pane" id="{{'tab_'.$no++}}">
                    <div class="row">
                      @foreach($itempercategory->cwi as $citem)
                      <div class="col-md-3">
                        <div class="w-100">
                          <img width="100%" src="https://www.nicepng.com/png/full/246-2463623_cafe-menu-logo-png.png">
                        </div>
                        <div class="" style="padding: 20px">
                          <h3><b>{{$citem->name}}</b></h3>
                          <p>Harga : {{$citem->price}}</p>
                          <p>Stock : {{$citem->stock}}</p>
                          <div class="input-group">
                            <div class="input-group-btn">
                              <div class="btn btn-primary">Qty</div>
                            </div>
                            <!-- /btn-group -->
                            <input class="input_qty" id="{{$citem->id}}" price="{{$citem->price}}" value="1" type="number" name="" style="width: 100%">
                          </div>
                          <h4>Total : <b class="tot_{{$citem->id}}">{{$citem->price}}</b></h4>
                          <div class="btn btn-primary add_cart" id="{{$citem->id}}" item="{{$citem->name}}" category="{{$citem->cate->name}}" price="{{$citem->price}}" style="width: 100%">Add to cart</div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                  @endforeach
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
	      <!-- /.box -->
	    </div>
      <div class="col-md-12">
      <form method="post" action="/orders/store">
        @csrf
        <div class="box">
          <div class="with-border" style="display: flex; justify-content: space-between;padding: 20px 20px 0">
            <div><h3 class="m-0" style="margin: 0"><b>Cart </b></h3></div>
            <div>
              <span style="margin-right: 20px">
                <label>
                User :
                <select name="user">
                  @foreach($usr as $user)
                  <option value="{{$user->id}}">{{$user->name}}</option>
                  @endforeach
                </select>
              </label>
              </span>
              <span>
                <label>
                Table : <input type="number" name="table">
              </label>
              </span>
            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th style="width: 60px">Qty</th>
                  <th style="width: 300px">Total</th>
                </tr>
              </thead>
              <tbody id="cart-list" class="">
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td colspan="4"><h3><b>TOTAL :</b></h3></td>
                  <td class=""><h3><b>RP.<span class="total-cart"></span></b></h3></td>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer ">
            <button type="submit" class="btn-lg btn-primary pull-right" style="width: 200px">Order</button>
          </div>
        </div>
        <!-- /.box -->
      </form>
      </div>
	    <!--/.col (right) -->
	  </div>

	  <!-- /.row -->
	</section>

@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    $('.input_qty').change(function(){
      var id = $(this).attr('id');
      var price = $(this).attr('price');
      var qty = $(this).val();
      var tot = price * qty;
      $('.tot_'+id).html(tot);
    });

    var list = 0;
    $('.add_cart').click(function(){
      var id = $(this).attr('id');
      var item = $(this).attr('item');
      var price = $(this).attr('price');
      var cate = $(this).attr('category');
      var qty = $('.input_qty[id="'+id+'"]').val();
      var tot = qty*price;

      list = list + 1;

      output = '<tr id="cart-row'+list+'">';
      output += '<td>'+list+'</td>';
      output += '<td>'+item+'<input type="hidden" value="'+id+'" name="item[]"></td>';
      output += '<td>'+cate+'</td>';
      output += '<td>'+price+'</td>';
      output += '<td>'+qty+'<input type="hidden" value="'+qty+'" name="qty[]"></td>';
      output += '<td class="total-item">'+tot+' <input type="hidden" value="'+tot+'" name="total[]"></td>';
      output += '</tr>';

      $('#cart-list').append(output);

      var total_row = 0;
      $('.total-item').each(function() {
        var row = $(this).text();
        total_row += parseInt(row);
      })
      $('.total-cart').html(total_row);
    });
  });
</script>
@endsection