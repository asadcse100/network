<!DOCTYPE html>
<html lang="en">

<head>
    <!--favicon-->
    @include('publisher.publisher_layouts.inc.meta')
    @include('publisher.publisher_layouts.inc.css')
    @yield('css')
</head>

<body>
    <!-- <div class="wrapper"> -->
        @include('publisher.publisher_layouts.header')
        @include('publisher.publisher_layouts.sidebar')
        @yield('content')
        @include('publisher.publisher_layouts.footer')
        @yield('js')
    <!-- </div> -->
</body>

</html>