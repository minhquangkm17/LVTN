@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="form-w3layouts">
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <form role="form" action="{{ route('admin.brand.postadd') }}" method="post"
                                    enctype="multipart/form">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                                        <input type="text" name="brand_name" class="form-control" id="name"
                                            value="{!! old('brand_name') !!}">
                                    </div>
                                    <div class="form-group">
                                        @error('brand_name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea class="form-control" id="ckeditor" name="brand_description">{!! old('brand_description') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        @error('brand_description')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="form-control input-lg m-bot15" id="stats" name="brand_stats">
                                            <option id="" value="1">Hiển thị</option>
                                            <option id="" value="0">Ẩn</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                    <button type="reset" class="btn btn-second">Xóa dữ liệu</button>
                                    <a href="{{ asset('admin/brand') }}" class="btn btn-danger" rel="nofollow">Trở
                                        về</a>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
