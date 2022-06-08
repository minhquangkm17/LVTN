@extends('layouts.master')
@extends('layouts.header')
@extends('layouts.footer')
@section('content')
    <!-- Breadcrumb Section End -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <hr style ="height:2px; border-width:0; color:gray; background-color:gray">
                    <div class="breadcrumb__text">
                        <h2>{{ $result->post_title }}</h2>

                    </div>
                    <div class="hero__item set-bg" data-setbg="{{ asset($result->post_img) }}"></div>
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
