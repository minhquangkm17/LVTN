@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Chỉnh sửa phần giới thiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <form role="form" action="{{ URL::to('admin/static-page/post-edit-intro') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @error('blog_title')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung trang giới thiệu</label>
                                <textarea class="form-control" id="introduce" name="content">{!! $result->post_content !!}</textarea>
                            </div>

                            <header style="padding; margin-top:50px" class="panel-heading">
                                NỘI DUNG SEO
                            </header>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Title</label>
                                <input type="text" name="post_seo_title" class="form-control" id="post_seo_title" value="{{$result->post_seo_title}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Keyword</label>
                                <input type="text" name="post_seo_keyword" class="form-control" id="post_seo_keyword" value="{{$result->post_seo_keyword}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Description</label>
                                <textarea class="form-control" id="post_seo_desc" name="post_seo_desc">{{$result->post_seo_desc}}</textarea>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button type="reset" class="btn btn-second">Xóa dữ liệu</button>
                            <a href="{{ asset('admin/blog/') }}" class="btn btn-danger" rel="nofollow">Trở
                                về</a>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </section>

     <script type="text/javascript">
        CKEDITOR.replace('content', {
            filebrowserBrowseUrl: '../../public/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@endsection
