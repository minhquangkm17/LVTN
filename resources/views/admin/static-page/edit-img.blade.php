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
                            Sửa Logo
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @if (session('msg'))
                                    <div class="alert alert-success">{{ session('msg') }}</div>
                                @endif
                                <div class="form-group" style="">
                                        <label class="control-label">Logo cũ</label>
                                        <img style=" width: 160px; height: 50px; object-fit: cover" src="{{ asset($logo->url) }}" class="">
                                    </div>
                                <form action="{{ URL::to('admin/static-page/post-logo') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                    <div class="form-group">
                                        @error('product_img')
                                            <span style="color:red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="product_img">Đổi hình ảnh: .jpg|.png|.jpeg| - Width: 160px - Height: 50px</label>
                                        <input type="file" value="{{$logo->url}}" name="url" class="form-control" id="url">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sửa</button>
                                    <button type="reset" class="btn btn-second">Xóa dữ liệu</button>
                                    <a href="{{ asset('admin/') }}" class="btn btn-danger" rel="nofollow">Trở
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
