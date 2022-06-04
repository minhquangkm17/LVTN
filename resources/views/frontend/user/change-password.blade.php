@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
    <!------ Include the above in your HEAD tag ---------->
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <span class="list-group-item list-group-item-action active">Dashboard</span>
                    <a href="{{ route('user.userDetail')}}" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="{{ route('user.editUserPassword')}}" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                    <a href="#" class="list-group-item list-group-item-action">Sản phẩm yêu thích</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="user_info">Đổi mật khẩu</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @php
                                    $userInfo = auth()->user()->id;
                                @endphp
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <form role="form" action="{{ URL::to('user/post-edit-password/' . $userInfo . '') }}"
                                    method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ auth()->user()->id }}">

                                    <div class="form-group row">
                                        <input type="hidden"class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('name')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-4 col-form-label">Mật khẩu cũ*</label>
                                        <div class="col-8">
                                            <input id="old_password" value="" name="old_password"
                                                placeholder="Nhập mật khẩu" class="form-control here" required="required"
                                                type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-4 col-form-label">Nhập mật khẩu mới*</label>
                                        <div class="col-8">
                                            <input id="new_password" value=""
                                                name="new_password" placeholder="Mật khẩu mới" class="form-control here"
                                                type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="new_password" class="col-4 col-form-label">Xác nhận mật khẩu*</label>
                                        <div class="col-8">
                                            <input id="confirm_password" value="" name="confirm_password"
                                                placeholder="Xác nhận mật khẩu" class="form-control here" required="required"
                                                type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                                            <button type="reset" class="btn btn-warning">Xóa dữ liệu</button>
                                            <a href="{{ asset('/trang-chu') }}" class="btn btn-danger" rel="nofollow">Trở
                                                về</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
                window.onload = function() {
                    document.getElementById("new_password").onchange = validatePassword;
                    document.getElementById("confirm_password").onchange = validatePassword;
                }

                function validatePassword() {
                    var pass2 = document.getElementById("confirm_password").value;
                    var pass1 = document.getElementById("new_password").value;
                    if (pass1 != pass2)
                        document.getElementById("confirm_password").setCustomValidity("Passwords Don't Match");
                    else
                        document.getElementById("confirm_password").setCustomValidity('');
                    //empty string means no validation error
                }
            </script>
@endsection
