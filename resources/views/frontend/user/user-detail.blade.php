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
                    <a href="{{route('user.userDetail')}}" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="#" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                    <a href="{{ route('user.favoriteProduct')}}" class="list-group-item list-group-item-action">Sản phẩm yêu thích</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="user_info">Thông tin người dùng</h4>
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
                                <form role="form" action="{{ URL::to('user/edit-user-detail/' . $userInfo . '') }}"
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
                                        <label for="username" class="col-4 col-form-label">Tên người dùng*</label>
                                        <div class="col-8">
                                            <input id="name" value="{{ auth()->user()->name }}" name="name"
                                                placeholder="Tên người dùng" class="form-control here" required="required"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden"class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('full_name')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Họ và tên</label>
                                        <div class="col-8">
                                            <input id="full_name" value="{{ auth()->user()->user_detail['full_name'] }}"
                                                name="full_name" placeholder="Họ và tên" class="form-control here"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="birthday" class="col-4 col-form-label">Ngày sinh</label>
                                        <div class="col-8">
                                            <input id="birthday" value="{{ auth()->user()->user_detail['birthday'] }}"
                                                name="birthday" placeholder="Ngày sinh" class="form-control here"
                                                type="date">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden"class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('email')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">Email*</label>
                                        <div class="col-8">
                                            <input id="email" value="{{ auth()->user()->email }}" name="email"
                                                placeholder="Email" class="form-control here" required="required"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden"class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('number_phone')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="number_phone" class="col-4 col-form-label">Số điện thoại*</label>
                                        <div class="col-8">
                                            <input id="number_phone"
                                                value="0{{ auth()->user()->user_detail['number_phone'] }}"
                                                name="number_phone" placeholder="Số điện thoại" class="form-control here"
                                                type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <input type="hidden"class="col-4 col-form-label">
                                        <div class="col-8">
                                            @error('address')
                                                <span style="color:red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-4 col-form-label">Địa chỉ*</label>
                                        <div class="col-8">
                                            <textarea id="address" name="address" cols="40" rows="4"
                                                class="form-control">{{ auth()->user()->user_detail['address'] }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">Xác nhận mật khẩu*</label>
                                        <div class="col-8">
                                            <input id="password" value="" name="password" placeholder="Xác nhận mật khẩu"
                                                class="form-control here" required="required" type="password">
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
@endsection
