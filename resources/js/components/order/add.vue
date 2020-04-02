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
                  <tr v-for="data in items">
                    <td>{{data.item}}</td>
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

{{-- <script type="text/javascript">
  export default {
    data() {
      return {
        data: []
      }
    },

    created() {
      let uri('localhost:8000/api/orders/add'),
      this.axios.get(uri).then(response=> {
        this.data = response.data.data;
      });
    }
  }
</script> --}}