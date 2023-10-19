@extends('layouts.app')

@section('css')
<style>
    body {
        background-color: #eee;
        font-family: "Poppins", sans-serif;
        font-weight: 300;
    }

    .search {
        position: relative;
        box-shadow: 0 0 20px rgba(51, 51, 51, .1);
    }

    .search input {
        height: 40px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;
    }

    .search input:focus {
        box-shadow: none;
        border: 2px solid blue;
    }

    .search .fa-search {
        position: absolute;
        top: 20px;
        left: 16px;
    }

    .search button {
        position: absolute;
        top: 27px;
        right: 5px;
        height: 32px;
        width: 110px;
        background: blue;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="search">
                    <!-- <i class="fa fa-search"></i> -->
                    <i class="fa"></i>
                    <input type="text" class="form-control" placeholder="Blog Search">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($blogs as $blog)
        <div class="col-xl-3 mb-3 mt-3">
            <a href="{{ route('blog.details', $blog->id) }}">
                <div class="card">
                    <img class="card-img-top" src="@if(!empty($blog->image)){{asset('uploads/'. $blog->image)}}@endif" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{!! Str::words($blog->title, 2, ' ..') !!}</h5>
                        <p class="card-text">{!! Str::words($blog->short_description, 8, ' ..') !!}</p>
                    </div>
                    <div class="card-footer">
                        @php
                        $delta_time = time() - strtotime($blog->updated_at);
                        $hours = floor($delta_time / 3600);
                        $delta_time %= 3600;
                        $minutes = floor($delta_time / 60);
                        @endphp
                        <small class="text-muted">Last updated {{$hours}} hours and {{$minutes}} minutes ago</small>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    {{ $blogs->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection