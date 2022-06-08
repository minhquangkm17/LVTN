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
                            Sửa danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <form action="{{ URL::to('admin/category/postedit/' . $result->id . '') }}" method="post"
                                    enctype="multipart/form">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        
                                        <input type="text" name="category_name" value="{{ $result->category_name }}"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        @error('category_name')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea type="text" class="form-control" name="description">{{ $result->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        @error('description')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
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
