@extends('template.app')

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
                    <input type="text" v-model="search" name="search" placeholder="Search Item" style="width: 100%">
                    <table class="table">
                        <tr v-for="item in filteredItems">
                          <td>@{{item.name}}</td>
                          <td>Rp. @{{item.price}}</td>
                          <td><button v-on:click="addCart(item)" class="btn btn-xs btn-success pull-right"><i class="fa fa-plus"></i></button></td>
                        </tr>
                    </table>
                  </div>
                </div>

                <div class="col-md-8">


                  <form class="form form-horizontal" action="/orders/store" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div>
                          <div class="form-group">
                            <label for="inputUser" class="col-sm-4 control-label">Customer</label>

                            <div class="col-sm-8">
                              <input type="Text" class="form-control" placeholder="{{Request::user()->name}}" disabled="">
                              {{-- <select name="user" class="form-control" id="inputUser">
                                <option v-for="user in user" v-bind:value="user.id">@{{user.name}}</option>
                              </select> --}}
                              <input type="hidden" name="user" class="form-control" id="inputUser" value="{{Request::user()->id}}">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputTable" class="col-sm-4 control-label">Table Number</label>

                            <div class="col-sm-8">
                              <input type="text" name="table" class="form-control" id="inputTable">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputAdmin" class="col-sm-4 control-label">Employee</label>

                            <div class="col-sm-8">
                              <input type="Text" class="form-control" id="inputAdmin" placeholder="Admin Example" disabled="">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">

                        <div>
                          <div class="form-group">
                            <label for="inputDate" class="col-sm-4 control-label">Date</label>

                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="inputDate" disabled="" v-model="tanggal">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPayment" class="col-sm-4 control-label">Password</label>

                            <div class="col-sm-8">
                              <select style="width: 100%">
                                <option v-for="py in payments" value="">@{{py.payment}}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tbody>
                              <tr>
                                <th>Item</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                              </tr>
                              <tr v-for="(cart, index) in selected">
                                <td>@{{cart.name}} <input type="hidden" name="item[]" v-bind:value="cart.id"></td>
                                <td>Rp. @{{cart.price}}<input type="hidden" v-bind:value="cart.price" v-model="cartPrice[index] = cart.price"></td>
                                <td><input type="number" v-bind:name="'qty['+index+']'" v-model="cartQty[index]" v-on:change="setTotal(index)"></td>
                                <td>Rp. @{{cartTotal[index]}}<input type="hidden" v-bind:name="'total['+index+']'" v-model="cartTotal[index]"></td>
                                <td><a v-on:click="deleteCart(index)" class="btn btn-sm btn-danger pull-right"><i class="fa fa-trash"></i></a></td>
                              </tr>
                            </tbody>
                          </table>
                          <br><br><br>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label for="inputDiscount" class="col-sm-4 control-label">Discount</label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="inputDiscount">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputPamount" class="col-sm-4 control-label">Payment Amount</label>

                          <div class="col-sm-8">
                            <input type="number" class="form-control" id="inputPamount" v-model="paymentAmount" v-on:change="setChange">
                          </div>
                        </div>
                      </div>

                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Total Cart</label>

                          <label class="col-sm-8 control-label">@{{allTotal}}</label>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-4 control-label">Change</label>

                          <label class="col-sm-8 control-label">@{{change}}</label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12 text-center">
                        <br><br>
                        <button type="submit" class="btn btn-sm btn-success" style="width: 100px">ORDER</button>
                      </div>
                    </div>

                  </form>


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
{{-- <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
<script type="text/javascript">
  new Vue({
    el: '#app',
    data: {
      items: [
        @foreach($item as $i)
          {id: {{$i->id}}, name:"{{$i->name}}" , price:{{$i->price}},},
        @endforeach
        ],
      payments:[
        @foreach($payment as $py)
          {id: {{$py->id}}, payment:"{{$py->name}}"},
        @endforeach
      ],
      user: [
        @foreach($usr as $user)
          {id: {{$user->id}}, name:"{{$user->name}}"},
        @endforeach
      ],
      selected: [],
      search: '',
      cartList:'',
      tanggal:'',
      cartPrice: [],
      cartQty: [],
      cartTotal: [],
      allTotal: 0,
      paymentAmount: '',
      change: 0,
    },

    computed: {
      filteredItems: function(){
        return this.items.filter((item)=> {
          return item.name.match(this.search);
        });
      },
    },

    methods: {
      addCart: function(i) {
        this.selected.push({
          id: i.id,
          name: i.name,
          price: i.price,
        });
      },
      deleteCart: function(i) {
        this.selected.splice(i, 1);
        this.cartQty.splice(i, 1);
        this.cartTotal.splice(i, 1);
        this.setAllTotal();
      },

      callFunction: function () {
          var currentDateWithFormat = new Date().toJSON().slice(0,10).replace(/-/g,'-');
          this.tanggal = currentDateWithFormat;
      },

      setTotal: function(i) {
        this.cartTotal[i] = this.cartPrice[i] * this.cartQty[i];
        this.setAllTotal();
      },
      setAllTotal: function() {
        this.allTotal = 0;
        this.cartTotal.forEach(row => {
          this.allTotal += row;
        });
      },
      setChange: function() {
        this.change = this.paymentAmount - this.allTotal ;
      }
    },
    mounted() {
      this.callFunction();
    },
  })
</script>
@endsection
