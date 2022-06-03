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
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <form role="form" action="{{ route('admin.category.postadd') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label class="control-label">STT</label>
                                        <input class="form-control" type="text" name="stt" id="stt" value="1">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tên danh mục</label>
                                        <input type="text" name="category_name" class="form-control" id="category_name"
                                            value="{!! old('category_name') !!}">
                                    </div>
                                    <div class="form-group">
                                        @error('category_name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="exampleInputEmail1">Slug</label>
                                        <textarea type="text" id="slug" value="" name="slug" class="form-control"></textarea>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả</label>
                                        <textarea class="form-control" id="ckeditor" name="description">{!! old('description') !!}</textarea>
                                    </div>
                                    <div class="form-group">
                                        @error('description')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Trạng thái</label>
                                        <select class="form-control input-lg m-bot15" id="stats" name="stats">
                                            <option id="" value="1">Hiển thị</option>
                                            <option id="" value="0">Ẩn</option>
                                        </select>
                                    </div>

                                    <header style="padding; margin-top:50px" class="panel-heading">
                                        NỘI DUNG SEO
                                    </header>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SEO Title</label>
                                        <input type="text" name="category_title" class="form-control" id="name" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SEO Keyword</label>
                                        <input type="text" name="category_keyword" class="form-control" id="name"
                                            value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">SEO Description</label>
                                        <textarea class="form-control" id="category_seo_desc" name="category_seo_desc"></textarea>
                                    </div>
                                    <div class="form-group">
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
            </div>
        </div>
    </section>
@endsection
