    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <li>
          <a href="#">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
          </a>
        </li>
        <li class="treeview" style="height: auto;">
          <a href="#">
            <i class="fa fa-book"></i> <span> Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="/category"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="/item"><i class="fa fa-circle-o"></i> Item</a></li>
          </ul>
        </li>
        <li>
          <a href='{{url("/orders")}}'>
            <i class="fa fa-shopping-cart"></i> <span> Order</span>
          </a>
        </li>
        <li>
          <a href='{{url("/users")}}'>
            <i class="fa fa-users"></i> <span> Customers</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-exclamation-triangle"></i> <span> Report</span>
          </a>
        </li>
      </ul>
    </section>