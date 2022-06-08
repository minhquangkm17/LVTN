@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Thương hiệu sản phẩm
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <form action="{{ route('admin.brand.add') }}">
                            <button type="submit" class="btn btn-primary">Thêm thương hiệu</button>
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
                                <th>Tên thương hiệu</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $key => $value)
                                @foreach ($value as $key2 => $brand)
                                    <tr>
                                        <th>{{ $key2 + 1 }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td class="texttd">{!! $brand->brand_description !!}</td>
                                        @if ($brand->brand_stats == 1)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"brand/disable/$brand->id\"><i class=\"fa-solid fa-eye\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        @if ($brand->brand_stats == 0)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"brand/enable/$brand->id\"><i class=\"fa-solid fa-eye-slash\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        <td>
                                            <a href="{{ URL::to('/admin/brand/edit/' . $brand->id . '') }}"
                                                class="active">
                                                <i style="color:green" class="fa-solid fa-pen-to-square"></i></a>
                                            <a id="delete" href="{{ URL::to('/admin/brand/deleted/' . $brand->id . '') }}"
                                            class="active" ui-toggle-class="">
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
                                {!! $value->appends(['brand'])->links() !!}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
@endsection

{{-- php artisan vendor:publish --tag=laravel-pagination
    câu lệnh custome css phân trang --}}
