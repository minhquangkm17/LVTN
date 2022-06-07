@section('header')
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ '/trang-chu' }}"><img src="{{ asset($logo->url) }}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="{{ asset('user.favoriteProduct')}}"><i class="fa fa-heart"></i> <span>{{$number}}</span></a></li>
                <li><a href="{{ asset('gio-hang') }}"><i class="fa fa-shopping-bag"></i> <span
                            class="number_cart"></span></a></li>
            </ul>
            {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{ asset('public/img/vietnam.png') }}" alt="">
                <div>Việt Nam</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            @php
                if (Auth::check()) {
                    $user = Auth::user()->name;
                    $my_var =
                        "<div class=\"header__top__right__language\">
                                                            <a class=\"header__top__right\">
                                                            <i class=\"fa-solid fa-user-check\"></i>" .
                        $user .
                        "</a>
                                                            <span class=\"arrow_carrot-down\"></span>
                                                            <ul>
                                                                <li><a href=\"http://localhost/jkshop/logout\"><i class=\"fa fa-sign-out\"></i> Đăng xuất</a></li>
                                                            </ul>
                                                        </div>";
                    echo $my_var;
                } else {
                    $my_var = "<div class=\"header__top__right__language\">
                                                            <a class=\"header__top__right\" href=\"http://localhost/jkshop/login\" >
                                                            <i class=\"fa-solid fa-right-to-bracket\"></i> Đăng nhập</a>
                                                            <span class=\"arrow_carrot-down\"></span>
                                                            <ul>
                                                                <li><a href=\"http://localhost/jkshop/register\"><i class=\"fa-regular fa-registered\"></i> Đăng ký</a></li>
                                                            </ul>
                                                        </div>";
                    echo $my_var;
                }
            @endphp
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ asset('trang-chu') }}">Trang chủ</a></li>
                <li><a href="{{ asset('gioi-thieu') }}">Giới thiệu</a></li>
                <li><a href="{{ asset('san-pham') }}">Sản phẩm</a></li>
                <li><a href="{{ asset('tin-tuc') }}">Tin tức</a></li>
                <li><a href="">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> 1751150052@gmail.com</li>
                <li>Miễn phí giao hàng trên toàn quốc</li>
            </ul>
        </div>
    </div>
    <!-- humberger end -->

    <!-- header start -->
    <header class="header">
        <div class="header_sticky">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__left">
                                <ul>
                                    <li><i class="fa fa-envelope"></i>1751150052@gmail.com</li>
                                    <li>Miễn phí giao hàng trên toàn quốc</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                                <div class="header__top__right__language">
                                    <img src="{{ asset('public/img/vietnam.png') }}" alt="">
                                    <div>Việt Nam</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="#">English</a></li>
                                    </ul>
                                </div>
                                @php
                                    if (Auth::check()) {
                                        $user = Auth::user()->name;
                                        $user_id = Auth::user()->id;
                                        $my_var =
                                            "<div class=\"header__top__right__language\">
                                                            <a class=\"header__top__right\" href=\"http://localhost/jkshop/user/user-detail\">
                                                            <i class=\"fa-solid fa-user-check\"></i>" .
                                            $user .
                                            "</a>
                                                            <span class=\"arrow_carrot-down\"></span>
                                                            <ul>
                                                                <li><a href=\"http://localhost/jkshop/logout\"><i class=\"fa fa-sign-out\"></i> Đăng xuất</a></li>
                                                            </ul>
                                                        </div>";
                                        echo $my_var;
                                    } else {
                                        $my_var = "<div class=\"header__top__right__language\">
                                                            <a class=\"header__top__right\" href=\"http://localhost/jkshop/login\" >
                                                            <i class=\"fa-solid fa-right-to-bracket\"></i> Đăng nhập</a>
                                                            <span class=\"arrow_carrot-down\"></span>
                                                            <ul>
                                                                <li><a href=\"http://localhost/jkshop/register\"><i class=\"fa-regular fa-registered\"></i> Đăng ký</a></li>
                                                            </ul>
                                                        </div>";
                                        echo $my_var;
                                    }
                                @endphp
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="header__logo">
                            <a href="{{ asset('/trang-chu') }}"><img
                                    style="height: 50px; width:120px; object-fit: cover;" src="{{ asset($logo->url) }}"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <nav class="header__menu">
                            <ul>
                                <li class="active"><a href="{{ asset('/trang-chu') }}">Trang chủ</a></li>
                                <li><a href="{{ asset('gioi-thieu') }}">Giới thiệu</a></li>
                                <li><a href="{{ asset('san-pham') }}">Sản phẩm</a>
                                </li>
                                <li><a href="{{ asset('tin-tuc') }}">Tin tức</a></li>
                                <li><a href="">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2">
                        <div class="header__cart">
                            <ul>
                                <li><a href="{{ asset('user/favorite-product') }}"><i class="fa fa-heart"></i>
                                        <span>{{$number}}</span></a></li>
                                <li><a href="{{ asset('gio-hang') }}"><i class="fa fa-shopping-bag"></i> <span
                                            class="number_cart"></span></a></li>
                            </ul>
                            {{-- <div class="header__cart__price">item: <span></span></div> --}}
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
@endsection

@push('scripts')
    <script !src="">
        $(document).ready(function() {
            const html = $(".number_cart");
            const url = "{{ route('cart.number') }}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }
            });
            $.ajax({
                url: url,
                dataType: "json",
                type: "get",
                async: true,
                data: {},
                success: function(data) {
                    html.html(data.number);
                },
                error: function(xhr, exception) {}
            });
        });
    </script>
@endpush
