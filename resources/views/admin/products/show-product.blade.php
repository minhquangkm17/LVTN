@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách sản phẩm
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <form action="{{ route('admin.product.add') }}">
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        </form>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá bán</th>
                                <th>Giảm giá</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Trạng thái</th>
                                <th style="width:20px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $key => $value)
                                @foreach ($value as $key2 => $product)
                                    <tr>
                                        <td>{{ $key2 + 1 }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td><img src="{{ asset($product->product_img) }}" height="100" width="100"><br>
                                            <a style="margin-top: 5px" class="btn btn-success"
                                                href="{{ asset('admin/product/gallery/'.$product->id.'') }}">Thêm gallery</a>
                                        </td>
                                        <td>{{ $product->product_price }}</td>
                                        <td>{{ $product->discount }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->brand_name }}</td>
                                        @if ($product->product_stats == 1)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"product/disable/$product->id\"><i class=\"fa-solid fa-eye\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        @if ($product->product_stats == 0)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"product/enable/$product->id\"><i class=\"fa-solid fa-eye-slash\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        <td>
                                            <a href="{{ URL::to('/admin/product/edit/'.$product->id.'') }}"
                                                class="active">
                                                <i style="color:green" class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::to('/admin/product/deleted/'.$product->id.'') }}"
                                                onclick="delete();" class="active" ui-toggle-class="">
                                                <i style="color:red" class="fa-solid fa-trash-can"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <div class="d-flex">
                                {{ $value->links() }}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
@endsection
