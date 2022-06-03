@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('/public/img/blog/blog.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 font-family="tahoma">Giới Thiệu</h2>
                        <div class="breadcrumb__option">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <hr>
        <div class="content">
            {!! $result->post_content !!}
        </div>
    </div>
@endsection
