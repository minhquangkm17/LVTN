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
                    <a href="{{ route('user.changePassword')}}" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
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
                                <h4 class="user_info">Sản phẩm yêu thích</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $key => $value)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td><img class="favorite_product_img" src="{{ asset($value->product_img)}}"></td>
                                                <td>{{$value->product_name}}</td>
                                                <td>{{ number_format($value->product_price)}} VND</td>
                                                <td><a href="{{asset ('user/del-favorite-product/'.$value->product_id)}}" class="active" ui-toggle-class="">
                                                <i style="color:red" class="fa-solid fa-trash-can"></i></a></td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
