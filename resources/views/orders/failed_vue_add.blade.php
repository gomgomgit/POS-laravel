{{-- @extends('template.app')

@section('content')
  <section class="content-header">
    <h1>
      Order
      <small> Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-shopping-cart"></i> Order</a></li>
      <li class="active">Add</li>
    </ol>
  </section>

	<section class="content" id="app">
	  <div class="row">
	    <!-- right column -->
	    <div class="col-md-12">
	      <!-- Horizontal Form -->
        <div class="box">
          <div class="box-header with-border">
            <p>Order</p>
            <div class="box-tools">
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">

            <div class="row">
              <div class="col-md-4">
                <div class="data-product">
                  <table class="table">
                    @foreach($item as $itm)
                      <tr>
                        <td v-model="nama">{{$itm->name}}</td>
                        <td>Rp. {{$itm->price}}</td>
                        <td><button class="btn btn-xs btn-success"><i class="fa fa-plus"></i></button></td>
                      </tr>
                    @endforeach
                      <tr v-for="item in items">
                        <td></td>
                      </tr>
                  </table>
                </div>
              </div>
            </div>

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
	    <!--/.col (right) -->
	  </div>

	  <!-- /.row -->
	</section>

@endsection

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.11/vue.min.js"></script>
<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      text: 'Doyok',
      kberubah: false,
      items: [

      ],
    },
    methods: {
      ganti() {
        this.text = 'rere';
      },
      gkelas() {
        this.kberubah = !this.kberubah;

      },
    }
  })
</script>

@endsection --}}


@extends('template.app')

@section('link')
  <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
@endsection

@section('content')
  <section class="content-header">
    <h1>
      Order
      <small> Add</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#"><i class="fa fa-shopping-cart"></i> Order</a></li>
      <li class="active">Add</li>
    </ol>
  </section>

  <section class="content" id="app">

  </section>

@endsection

@section('script')
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
@endsection