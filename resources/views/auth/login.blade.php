<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/css/login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/css/login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/login/css/bootstrap.min.css') }}">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('public/css/login/css/style.css') }}">

    <title>Login JK Shop</title>
</head>

<body>

    <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('public/img/login.jpg');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <h3 class="title" style="text-align: center">Đăng nhập</h3>
                            <p class="mb-4"></p>
                        </div>

                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group first">
                                <label for="email" :value="__('Email')">Email</label>
                                <input type="email" class="form-control" name="email" id="email" :value="old('email')"
                                    required autofocus>
                            </div>
                            <div class="form-group last mb-3">
                                <label for="password" :value="__('Password')">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="current-password">

                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span {{ __('Remember me') }}
                                        class="caption">Remember me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <div class="ml-auto">
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <input type="submit" value="Log In" class="btn btn-block btn-primary">

                            <span class="d-block text-center my-4 text-muted">&mdash; or &mdash;</span>

                            <div class="social-login">
                                <a href="#" class="facebook btn d-flex justify-content-center align-items-center">
                                    <span class="icon-facebook mr-3"></span> Login with Facebook
                                </a>
                                <a href="#" class="twitter btn d-flex justify-content-center align-items-center">
                                    <span class="icon-twitter mr-3"></span> Login with Twitter
                                </a>
                                <a href="#" class="google btn d-flex justify-content-center align-items-center">
                                    <span class="icon-google mr-3"></span> Login with Google
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>



    <script src="{{ asset('public/css/login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/css/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/css/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/css/login/js/main.js') }}"></script>
</body>

</html>
