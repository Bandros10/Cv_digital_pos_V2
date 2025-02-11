<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">POS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">ORDER HERE</li>
                <li class="nav-item">
                    <a href="{{route('order.index')}}" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            ORDER
                            <span class="right badge badge-danger">New Order</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">MAANAGEMENT CUSTOMER</li>
                <li class="nav-item">
                    <a href="{{route('customer.index')}}" class="nav-link">
                        <i class="fas fa-user-tag"></i>
                        <p>
                            Customer Data
                        </p>
                    </a>
                </li>
                <li class="nav-header">MAANAGEMENT PRODUCT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-boxes"></i>
                        <p>
                            Product
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Index Product</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
