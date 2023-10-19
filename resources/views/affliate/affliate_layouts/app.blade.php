<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('affliate.affliate_layouts.inc.meta')
    @include('affliate.affliate_layouts.inc.css')
    @yield('css')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--page-wrapper-->
        <div class="page-wrapper">
            @include('affliate.affliate_layouts.header')
            @include('affliate.affliate_layouts.sidebar')
            @yield('content')
            @include('publisher.publisher_layouts.footer');
            @yield('js')
        </div>
    </div>
</body>

</html>