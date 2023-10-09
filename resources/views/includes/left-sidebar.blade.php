<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('dist/img/avatar5.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            {{--<img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">--}}
        </div>
        <div class="info">
            <a href="#" class="d-block"></a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item ">
                <a href="{{ url('/') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <!--users start-->
            {{-- <li class="nav-item has-treeview {{ isActive(['admin/users*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/users*']) }}"> --}}
            {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Users</p>
                        </a>
                    </li>
                </ul>
            </li> --}}
            <!--users end-->

            <!--Category Details start-->
            <li class="nav-item has-treeview {{ isActive(['admin/details*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/details*']) }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Category
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('category.create') }}"
                            class="nav-link {{ isActive(['admin/category/create']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Category</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link {{ isActive('[category]') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Catgory</p>
                        </a>
                    </li>
                </ul>
            </li>
            <!--Category end-->

            <!--Category Details start-->
            <li class="nav-item has-treeview {{ isActive(['admin/details*']) }}">
                <a href="#" class="nav-link {{ isActive(['admin/details*']) }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Details
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('details.create') }}"
                            class="nav-link {{ isActive(['admin/details/create']) }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Details</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>All Details</p>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <!--Category end-->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
