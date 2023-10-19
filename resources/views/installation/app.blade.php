<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'App Name') }}</title>
    <!-- Scripts -->
    <script src="{{asset('cdn')}}/site/js/app.js" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    <link href="{{asset('cdn')}}/site/css/app.css" rel="stylesheet">

    @yield('css')
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{Route('home')}}">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="app">
        <!-- <img src="{{asset('uploads/blog_header.jpg')}}" class="img-fluid" alt="Responsive image" height="30%" width="100%"> -->
        <main class="py-0">
            @yield('content')
        </main>
    </div><br><br><br>
    @php
    try {
    \DB::connection()->getPDO();
    $site_name = DB::table('system_configurations')->where('type', 'site_name')->first()->value;
    } catch (\Exception $e) {
    $site_name = '';
    }
    @endphp

    <footer class="bg-light text-center text-white fixed-bottom">
        <!-- Copyright -->
        <div class="text-center p-3 " style="background-color: black">
            © {{date('Y')}} Copyright:
            <a class="text-white" href="{{Route('home')}}">@if(!empty($site_name)){{ $site_name }}@endif</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>