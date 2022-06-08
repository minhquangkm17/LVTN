@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm bài viết
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <form role="form" action="{{ route('admin.blog.postadd') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @error('title')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" onkeyup="ChangeToSlug()" name="title" class="form-control" id="title">
                            </div>
                            <div class="form-group">
                                <label for="slug">Đường dẫn</label>
                                <input type="text" name="slug" class="form-control" id="slug">
                            </div>
                            <div class="form-group">
                                @error('blog_description')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tóm tắt</label>
                                <textarea class="form-control" name="blog_description"></textarea>
                            </div>
                            <div class="form-group">
                                @error('blog_img')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="blog_img">Hình ảnh</label>
                                <input type="file" value="" name="blog_img" class="form-control" id="blog_img">
                            </div>
                            <div class="form-group">
                                @error('blog_content')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nội dung</label>
                                <textarea class="form-control" id="blog_content" name="blog_content"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control input-lg m-bot15" id="blog_stats" name="blog_stats">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <header style="padding; margin-top:50px" class="panel-heading">
                                NỘI DUNG SEO
                            </header>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Title</label>
                                <input type="text" name="post_seo_title" class="form-control" id="post_seo_title"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Keyword</label>
                                <input type="text" name="post_seo_keyword" class="form-control" id="post_seo_keyword"
                                    value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">SEO Description</label>
                                <textarea class="form-control" id="post_seo_desc" name="post_seo_desc"></textarea>
                            </div>
                            <div class="form-group">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
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
        function ChangeToSlug() {
            var title, slug;

            //Lấy text từ thẻ input title
            title = document.getElementById("title");

            //Đổi chữ hoa thành chữ thường
            slug = title.value.toLowerCase();

            //Đổi ký tự có dấu thành không dấu
            slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
            slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
            slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
            slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
            slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
            slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
            slug = slug.replace(/đ/gi, 'd');
            //Xóa các ký tự đặt biệt
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_ /gi, '');
            //Đổi khoảng trắng thành ký tự gạch ngang 
            slug = slug.replace(/ /gi, "-");
            //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang 
            //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-'); //Xóa các ký tự gạch ngang ở đầu và cuối
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, ''); //In slug ra textbox có id “slug”
            slug = slug.replace(' ', '');
            let inputSlug = document.getElementById('slug').value = slug;
        }
    </script>

    <script type="text/javascript">
        CKEDITOR.replace('blog_content', {
            filebrowserBrowseUrl: '../../public/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        });
    </script>
@endsection
