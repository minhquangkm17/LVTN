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
                    <a href="{{ route('user.userDetail') }}" class="list-group-item list-group-item-action">Thông tin cá
                        nhân</a>
                    <a href="{{ route('user.changePassword') }}" class="list-group-item list-group-item-action">Đổi mật
                        khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                    <a href="{{ route('user.favoriteProduct') }}" class="list-group-item list-group-item-action">Sản phẩm
                        yêu thích</a>
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
                                <form role="form" action="{{ URL::to('user/post-change-password/' . $userInfo . '') }}"
                                    method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ auth()->user()->id }}">

                                    <div class="form-group row">
                                        <input type="hidden" class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('old_password')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            @error('password')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                            @error('password_confirmation')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        $message = Session::get('message');
                                        if ($message) {
                                            echo "<div class='alert alert-danger' style='text-align: center'>$message</div>";
                                            Session::put('message', null);
                                        }
                                    @endphp
                                    <div class="form-group row">
                                        <label for="old_password" class="col-4 col-form-label">Mật khẩu cũ*</label>
                                        <div class="col-8">
                                            <input id="old_password" value="" name="old_password" placeholder="Mật khẩu cũ"
                                                class="form-control here" required="required" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-4 col-form-label">Mật khẩu mới</label>
                                        <div class="col-8">
                                            <input id="password" value="" name="password" placeholder="Mật khẩu mới"
                                                class="form-control here" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password_confirmation" class="col-4 col-form-label">Nhập lại mật
                                            khẩu*</label>
                                        <div class="col-8">
                                            <input id="password_confirmation" value="" name="password_confirmation"
                                                placeholder="Nhập lại mật khẩu" class="form-control here"
                                                required="required" type="password">
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
    <script>
        function validate() {
            var n1 = document.getElementById("new_password1");
            var n2 = document.getElementById("new_password2");
            if (n1.value != "" && n2.value != "") {
                if (n1.value == n2.value) {
                    return true;
                }
            }
            alert("Dư liệu không được để trống, không được giống nhau");
            return false;
        }
    </script>
@endsection
