@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
    <!------ Include the above in your HEAD tag ---------->
    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="list-group ">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">Thông tin cá nhân</a>
                    <a href="#" class="list-group-item list-group-item-action">Đổi mật khẩu</a>
                    <a href="#" class="list-group-item list-group-item-action">Quản lý đơn hàng</a>
                    <a href="#" class="list-group-item list-group-item-action">Sản phẩm yêu thích</a>
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
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Hình ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Giá</th>
                                            <th scope="col">Trạng thái</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listPaymentHistories as $key => $list)
                                        @dd($list)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td></td>
                                                <td>Mark</td>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>Otto</td>
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
