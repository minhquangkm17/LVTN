@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh mục sản phẩm
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <form action="{{ route('admin.category.add') }}">
                            <button type="submit" class="btn btn-primary">Thêm danh mục</button>
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
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $key => $value)
                                @foreach ($value as $key2 => $cate)
                                    <tr>
                                        <th>{{ $key2 + 1 }}</th>
                                        <td>{{ $cate->category_name }}</td>
                                        <td class="texttd">{!! $cate->description !!}</td>
                                        @if ($cate->stats == 1)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"category/unactive/$cate->id\"><i class=\"fa-solid fa-eye\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        @if ($cate->stats == 0)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"category/active/$cate->id\"><i class=\"fa-solid fa-eye-slash\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        <td>
                                            <a href="{{ URL::to('/admin/category/edit/' . $cate->id . '') }}"
                                                class="active">
                                                <i style="color:green" class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::to('/admin/category/deleted/' . $cate->id . '') }}"
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
