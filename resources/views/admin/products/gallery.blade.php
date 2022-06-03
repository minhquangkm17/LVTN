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
                            Thêm Gallery
                        </header>
                        <div class="col-lg-12" style="margin:50px 0 50px 0; padding">
                            <form action="{{ URL::to('admin/product/add-gallery/' . $id . '') }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Chèn ảnh vào gallery</label>
                                        <input class="form-control" type="file" id="file" name="file[]" accept="image/*"
                                            multiple>
                                        <span id="error_gallery"></span>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 22px">
                                        <input class="btn btn-success" type="submit" id="file" name="Upload" value="upload">
                                    </div>
                                </div>
                            </form>
                            <hr style="height:2px;border-width:10;color:gray;background-color:gray">
                        </div>

                        <div class="panel-body">
                            <input type="hidden" class="product_id" name="product_id" value="{{ $id }}">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div id="gallery">

                                </div>
                            </form>
                        </div>
                        <div class="row w3-res-tb">
                            <div class="col-sm-5 m-b-xs">
                                <a class="btn btn-danger" href="{{asset('admin/product')}}">Trở về</a>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
@endsection
