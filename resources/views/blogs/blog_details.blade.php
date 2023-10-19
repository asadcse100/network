@extends('layouts.app')
@section('meta')
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="@if (!empty($blog->meta_title)) {{ $blog->meta_title }} @endif">
<meta itemprop="description" content="@if (!empty($blog->meta_description)) {{ $blog->meta_description }} @endif">
<meta itemprop="image" content="@if (!empty($blog->meta_img)) {{ asset($blog->meta_img) }} @endif">

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="@if (!empty($blog->meta_title)) {{ $blog->meta_title }} @endif">
<meta name="twitter:description" content="@if (!empty($blog->meta_description)) {{ $blog->meta_description }} @endif">
<meta name="twitter:creator" content="@author_handle">
<meta name="twitter:image" content="@if (!empty($blog->meta_img)){{ asset($blog->meta_img) }}@endif">

<!-- Open Graph data -->
<meta property="og:title" content="@if (!empty($blog->meta_title)){{ $blog->meta_title }}@endif" />
<meta property="og:type" content="website" />
@if (!empty($blog->slug))
<meta property="og:url" content="{{ route('blog.details', $blog->slug) }}" />
@else
<meta property="og:url" content="{{ route('blog.details', $blog->id) }}" />
@endif
<meta property="og:image" content="@if (!empty($blog->meta_img)){{ asset($blog->meta_img) }}@endif" />
<meta property="og:description" content="@if (!empty($blog->meta_description)){{ $blog->meta_description }}@endif" />
<meta property="og:site_name" content="{{ env('APP_NAME') }}" />


@endsection


@section('content')
<section class="bg-light py-4">
<div class="middle-content container-xxl p-0">
            <!-- BREADCRUMB -->
            <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">App</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post</li>
                </ol>
            </nav>
        </div>
        </div>
        <!-- /BREADCRUMB -->
                        <div class="container px-5">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-10 col-xl-10">
                                    <div class="single-post">
                                        <h1>@if (!empty($blog->title)){{ $blog->title }}@endif</h1>
                                        <p class="lead">Empower communities and energize engaging ideas; scale and impact do-gooders while disruptring industries. Venture philanthropy benefits corporations and people by moving the needle.</p>
                                        <div class="d-flex align-items-center justify-content-between mb-5">
                                            <div class="single-post-meta me-4">
                                                <img class="single-post-meta-img" src="assets/img/illustrations/profiles/profile-1.png" />
                                                <div class="single-post-meta-details">
                                                    <div class="single-post-meta-details-name">Valerie Luna</div>
                                                    <div class="single-post-meta-details-date">Feb 5 · 6 min read</div>
                                                </div>
                                            </div>
                                            <div class="single-post-meta-links">
                                                <a href="#!"><i class="fab fa-twitter fa-fw"></i></a>
                                                <a href="#!"><i class="fab fa-facebook-f fa-fw"></i></a>
                                                <a href="#!"><i class="fas fa-bookmark fa-fw"></i></a>
                                            </div>
                                        </div>
                                        <img class="img-fluid mb-2 rounded" src="https://source.unsplash.com/vZJdYl5JVXY/990x540" />
                                        <div class="small text-gray-500 text-center">Photo Credit: Unsplash</div>
                                        <div class="single-post-text my-5">
                                        @if (!empty($blog->description)){!! $blog->description !!}@endif
                                            <div class="text-center"><a class="btn btn-transparent-dark" href="page-blog-overview.html">Back to Blog Overview</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>


@endsection

@section('script')
@php
    $fb_comment_activation_checkbox = DB::table('system_configurations')->where('type', 'fb_comment_activation_checkbox')->first()->value;
@endphp
@if ($fb_comment_activation_checkbox == 1)
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0&appId={{ env('FACEBOOK_COMMENT_APP_ID') }}&autoLogAppEvents=1" nonce="ji6tXwgZ"></script>
@endif
@endsection