@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <form role="form" action="{{ route('admin.product.postadd') }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @error('product_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" onkeyup="ChangeToSlug()" id="product_name"
                                    value="{!! old('product_name') !!}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="product_slug" class="form-control" id="product_slug"
                                    value="{!! old('product_slug') !!}">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control input-lg m-bot15" placeholder="Chọn danh mục" id="category"
                                    name="category_id">
                                    @foreach ($cate as $key => $cate_value)
                                        @foreach ($cate_value as $key2 => $value)
                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control input-lg m-bot15" placeholder="Chọn danh mục" id="category"
                                    name="brand_id">
                                    @foreach ($brands as $key => $brand_value)
                                        @foreach ($brand_value as $key2 => $value)
                                            <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                @error('product_price')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá bán</label>
                                <input type="text" name="product_price" class="form-control" id="name"
                                    value="{!! old('product_price') !!}">
                            </div>
                            <div class="form-group">
                                @error('discount')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá</label>
                                <input type="text" name="discount" class="form-control" id="name"
                                    value="{!! old('discount') !!}">
                            </div>
                            <div class="form-group">
                                @error('product_img')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_img">Hình ảnh</label>
                                <input type="file" value="{!! old('product_img') !!}" name="product_img" class="form-control"
                                    id="product_img">
                            </div>
                            <div class="form-group">
                                @error('product_decription')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <textarea class="form-control" name="product_decription">{!! old('product_decription') !!}</textarea>
                            </div>
                            <div class="form-group">
                                @error('product_spec')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thông số kỹ thuật</label>
                                <textarea class="form-control" id="product_spec" name="product_spec">{!! old('product_spec') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-control input-lg m-bot15" id="product_stats" name="product_stats">
                                    <option value="1">Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
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

        <script type="text/javascript">
            function ChangeToSlug() {
                var title, slug;

                //Lấy text từ thẻ input title
                title = document.getElementById("product_name");

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
                let inputSlug = document.getElementById('product_slug').value = slug;
            }
        </script>

    </section>
@endsection
