@section('sidebar')
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="index">
                            <i class="fa-solid fa-house"></i>
                            <span>Trang chủ</span>
                        </a>
                    </li>

                    {{-- <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>UI Elements</span>
                        </a>
                        <ul class="sub">
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="glyphicon.html">glyphicon</a></li>
                            <li><a href="grids.html">Grids</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="fontawesome.html">
                            <i class="fa fa-bullhorn"></i>
                            <span>Font awesome </span>
                        </a>
                    </li> --}}
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa-solid fa-users"></i>
                            <span>Quản lý người dùng</span>
                        </a>
                        <ul class="sub">
                            <li><a href="#">Danh sách người dùng</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa-solid fa-list-ul"></i>
                            <span>Quản lý danh mục</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('admin.category.show') }}">Danh sách danh mục</a></li>
                            <li><a href="{{ route('admin.category.add') }}">Thêm danh mục</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa-solid fa-medal"></i>
                            <span>Quản lý thương hiệu</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('admin.brand.show') }}">Danh sách thương hiệu </a></li>
                            <li><a href="{{ route('admin.brand.add') }}">Thêm thương hiệu</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa-solid fa-box-open"></i>
                            <span>Quản lý sản phẩm</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('admin.product.show') }}">Danh sách sản phẩm </a></li>
                            <li><a href="{{ route('admin.product.add') }}">Thêm sản phẩm</a></li>
                        </ul>

                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                           <i class="fa-solid fa-newspaper"></i>
                            <span>Quản lý bài viết</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('admin.blog.show') }}">Danh sách bài viết </a></li>
                            <li><a href="{{ route('admin.blog.add') }}">Thêm bài viết</a></li>
                        </ul>
                    </li>
                     <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-glass"></i>
                            <span>Quản lý trang</span>
                        </a>
                        <ul class="sub">
                            <li><a href="">Quản lý hình ảnh</a></li>
                            <li><a href="{{ route('admin.static.editIntro')}}">Giới Thiệu</a></li>
                            <li><a href="">Thông tin liên lạc</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <span>Bản đồ</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('admin.map')}}">Google Map</a></li>
                        </ul>
                    </li>
                    {{-- <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-envelope"></i>
                            <span>Mail </span>
                        </a>
                        <ul class="sub">
                            <li><a href="mail.html">Inbox</a></li>
                            <li><a href="mail_compose.html">Compose Mail</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Charts</span>
                        </a>
                        <ul class="sub">
                            <li><a href="chartjs.html">Chart js</a></li>
                            <li><a href="flot_chart.html">Flot Charts</a></li>
                        </ul>
                    </li>
                    
                   
                    <li>
                        <a href="login.html">
                            <i class="fa fa-user"></i>
                            <span>Login Page</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
@endsection
