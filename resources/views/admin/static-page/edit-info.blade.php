@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa thông tin liên lạc
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <form role="form" action="{{ route('admin.static.postEditInFo') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @error('address')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" id="address"
                                    value="{!! $info->address !!}">
                            </div>
                             <div class="form-group">
                                @error('number_phone')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="numberPhone">Số điện thoại</label>
                                <input type="number" name="number_phone" class="form-control" id="number_phone"
                                    value="{!! $info->number_phone !!}">
                            </div>
                            <div class="form-group">
                                @error('email')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" name="email" class="form-control" id="email"
                                    value="{!! $info->email !!}">
                            </div>
                            <div class="form-group">
                                @error('opentime')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="openTime">Giờ mở cửa</label>
                                <input type="time" name="opentime" class="form-control" id="opentime"
                                    value="{!! $info->opentime !!}">
                            </div>
                            <div class="form-group">
                                @error('closetime')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="closeTime">Giờ mở cửa</label>
                                <input type="time" name="closetime" class="form-control" id="closetime"
                                    value="{!! $info->closetime !!}">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Thêm</button>
                            <button type="reset" class="btn btn-second">Xóa dữ liệu</button>
                            <a href="{{ asset('admin/category') }}" class="btn btn-danger" rel="nofollow">Trở
                                về</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>
@endsection
