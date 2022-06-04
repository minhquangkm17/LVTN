<!doctype html>
<html>

<head>
    <title>Register JK Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords"
        content="Official Signup Form Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <!-- /fonts -->
    <!-- css -->
    <link href="{{ asset('public/css/register/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"
        media="all" />
    <link href="{{ asset('public/css/register/css/style.css') }}" rel='stylesheet' type='text/css' media="all" />
    <!-- /css -->
</head>

<body>
    <h1 class="w3ls">Đăng kí tài khoản</h1>
    <div class="content-w3ls">
        <div class="content-agile1">
            <h2 class="agileits1">JK SHOP</h2>
            <p class="agileits2">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
        <div class="content-agile2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-control w3layouts">
                    <input id="name" type="text" name="name" placeholder="Tên người dùng"
                        title="Vui lòng nhập tên người dùng" :value="old('name')" required autofocus>
                </div>

                <div class="form-control w3layouts">
                    <input placeholder="Email" title="Vui lòng nhập email" id="email" type="email" name="email"
                        :value="old('email')" required>
                </div>
                <div class="form-control w3layouts">
                    <input placeholder="Số điện thoại" title="Vui lòng nhập SĐT" id="number_phone" type="phone" name="number_phone" :value="old('number_phone')" required>
                </div>
                <div class="form-control w3layouts">
                    <input placeholder="Địa chỉ" title="Vui lòng nhập địa chỉ" id="address" type="text" name="address"
                        :value="old('address')" required>
                </div>

                <div class="form-control agileinfo">
                    <input class="lock" name="password" placeholder="Mật khẩu" id="password" type="password"
                        name="password" required autocomplete="new-password">
                </div>

                <div class="form-control agileinfo">
                    <input class="lock" placeholder="Xác nhận mật khẩu" id="password_confirmation"
                        type="password" name="password_confirmation" required>
                </div>

                <input type="submit" class="register" value="Đăng kí">
            </form>

            {{-- <script type="text/javascript">
                window.onload = function() {
                    document.getElementById("password1").onchange = validatePassword;
                    document.getElementById("password2").onchange = validatePassword;
                }

                function validatePassword() {
                    var pass2 = document.getElementById("password2").value;
                    var pass1 = document.getElementById("password1").value;
                    if (pass1 != pass2)
                        document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                    else
                        document.getElementById("password2").setCustomValidity('');
                    //empty string means no validation error
                }
            </script> --}}
            <p class="wthree w3l">Đăng kí bằng các tài khoản khác</p>
            <ul class="social-agileinfo wthree2">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <p class="copyright w3l">© 2022 Official Signup Form. All Rights Reserved || JK SHOP </p>
</body>

</html>
