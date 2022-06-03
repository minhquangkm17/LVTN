@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sửa sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @if (session('msg'))
                            <div class="alert alert-success">{{ session('msg') }}</div>
                        @endif
                        <form role="form" action="{{ URL::to('admin/product/postedit/' . $result->id . '') }}"
                            method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                @error('product_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input onkeyup="ChangeToSlug()" id="product_name" type="text" name="product_name" class="form-control"
                                    value="{{ $result->product_name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="product_slug" id="product_slug" class="form-control"
                                    value="{{ $result->product_slug }}">
                            </div>
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="form-control input-lg m-bot15" name="category_id">
                                    @foreach ($cate as $key => $cate_value)
                                        @foreach ($cate_value as $key2 => $value)
                                            @if ($value->id === $result->category_id)
                                                <option selected value="{{ $value->id }}">{{ $value->category_name }}
                                                </option>
                                            @else
                                                <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thương hiệu</label>
                                <select class="form-control input-lg m-bot15" name="brand_id">
                                    @foreach ($brands as $key => $brand_value)
                                        @foreach ($brand_value as $key2 => $value)
                                            @if ($value->id === $result->brand_id)
                                                <option selected value="{{ $value->id }}">{{ $value->brand_name }}
                                                </option>
                                            @else
                                                <option value="{{ $value->id }}">{{ $value->brand_name }}</option>
                                            @endif
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
                                    value="{{ $result->product_price }}">
                            </div>
                            <div class="form-group">
                                @error('discount')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giảm giá</label>
                                <input type="text" name="discount" class="form-control" id="name"
                                    value="{{ $result->discount }}">
                            </div>
                            <div class="form-group">
                                @error('product_img')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_img">Hình ảnh</label>
                                <input type="file" value="{{ $result->product_img }}" name="product_img"
                                    class="form-control" id="product_img">
                                <img src="{{ asset($result->product_img) }}" height="100" width="100">
                            </div>
                            <div class="form-group">
                                @error('product_decription')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mô tả</label>
                                <textarea class="form-control" id="ckeditor" name="product_decription">{{ $result->product_decription }}</textarea>
                            </div>
                            <div class="form-group">
                                @error('product_spec')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Thông số kỹ thuật</label>
                                <textarea class="form-control" id="ckeditor" name="product_spec">{{ $result->product_spec }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <button type="reset" class="btn btn-second">Xóa dữ liệu</button>
                            <a href="{{ asset('admin/prduct') }}" class="btn btn-danger" rel="nofollow">Trở
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
@endsection
