@extends('admin.layouts.master')
@extends('admin.layouts.sidebar')
@extends('admin.layouts.header')
@section('content')
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Bài viết
                </div>
                <div class="row w3-res-tb">
                    <div class="col-sm-5 m-b-xs">
                        <form action="{{ route('admin.blog.add') }}">
                            <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                        </form>
                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <input type="text" class="input-sm form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-sm btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tiêu đê</th>
                                <th>Trạng thái</th>
                                <th style="width:30px;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($result as $key => $value)
                                @foreach ($value as $key2 => $post)
                                    <tr>
                                        <th>{{ $key2 + 1 }}</th>
                                        <td><img src="{{ asset($post->post_img) }}" height="100" width="100"><br>
                                        <td>{{ $post->post_title }}</td>
                                        @if ($post->post_stats == 1)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"blog/disable/$post->id\"><i class=\"fa-solid fa-eye\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        @if ($post->post_stats == 0)
                                            @php
                                                $my_var = "<td><a class=\"active1\" href=\"blog/enable/$post->id\"><i class=\"fa-solid fa-eye-slash\"></i></a></td>";
                                                echo $my_var;
                                            @endphp
                                        @endif
                                        <td>
                                            <a href="{{ URL::to('/admin/blog/edit/' . $post->id . '') }}"
                                                class="active">
                                                <i style="color:green" class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{ URL::to('/admin/blog/deleted/' . $post->id . '') }}"
                                                onclick="delete();" class="active" ui-toggle-class="">
                                                <i style="color:red" class="fa-solid fa-trash-can"></i></a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">

                        <div class="col-sm-5 text-center">
                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                        </div>
                        <div class="col-sm-7 text-right text-center-xs">
                            <div class="d-flex">
                                {{ $value->links() }}
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </section>
@endsection
