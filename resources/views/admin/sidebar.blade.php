<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('dash/img/avatar-6.jp') }}g" alt="..." class="img-fluid rounded-circle">
        </div>
        <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ url('admin/dashboard') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ url('view_categoty') }}"> <i class="icon-list"></i>Category </a></li>
        {{-- <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
        <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li> --}}
        <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-box"></i>
                Products </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{ url('add_products') }}">Add Products</a></li>
                <li><a href="{{ url('view_product') }}">View Product</a></li>

            </ul>
        </li>

        <li><a href="{{ url('view_orders') }}"><i class="fas fa-receipt"></i> Orders</a></li>

        <li><a href="{{ url('chart') }}"> <i class="fa fa-bar-chart"></i>Charts </a></li>
</nav>
