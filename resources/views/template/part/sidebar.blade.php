    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ Avatar::create(Request::user()->name)->toBase64() }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Request::user()->name}}</p>
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
        @can('isAdmin')
        <li class="dashboard-menu {{request::is('dashboard') ? 'active' : ''}}">
          <a href="{{url('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span> Dashboard</span>
          </a>
        </li>
        <li class="treeview product-menu {{request::is('category*', 'item*') ? 'active menu-open' : ''}}" style="height: auto;">
          <a href="#">
            <i class="fa fa-book"></i> <span> Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu  product-dd" style="display: {{request::is('category*', 'item*') ? 'block' : 'none'}};">
            <li class="category-menu {{request::is('category*') ? 'active menu-open' : ''}}"><a href="{{route('haha')}}"><i class="fa fa-circle-o"></i> Category</a></li>
            <li class="item-menu {{request::is('item*') ? 'active menu-open' : ''}}"><a href="/item"><i class="fa fa-circle-o"></i> Item</a></li>
          </ul>
        </li>
        @endcan
        <li class="order-menu {{request::is('orders*') ? 'active' : ''}}">
          <a href='{{url("/orders")}}'>
            <i class="fa fa-shopping-cart"></i> <span> Order</span>
          </a>
        </li>
        @can('isAdmin')
        <li class="user-menu {{request::is('users*') ? 'active' : ''}}">
          <a href='{{url("/users")}}'>
            <i class="fa fa-users"></i> <span> User</span>
          </a>
        </li>
        <li class="user-menu {{request::is('customer*') ? 'active' : ''}}">
          <a href='{{url("/customer")}}'>
            <i class="fa fa-users"></i> <span> Customer</span>
          </a>
        </li>
        <li class="report-menu">
          <a href="#">
            <i class="fa fa-exclamation-triangle"></i> <span> Report</span>
          </a>
        </li>
        @endcan
      </ul>
    </section>