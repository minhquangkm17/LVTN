@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa phần hình ảnh trang chủ
                </header>
                <div class="panel-body">
                    <div class="container">
                        <div class="img_logo">
                            <label for="logo">Logo</label>
                            <input type="file">
                        </div>
                        <div class="img_main_banner">
                            <label for="main_banner">Banner Chính</label>
                            <input type="file" >
                        </div>
                        <div class="sub_banner">
                            <label for="sub_banner">Banner phụ trái</label>
                            <input type="file">
                            <label for="sub_banner">Banner phụ phải</label>
                            <input type="file">
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>
@endsection
