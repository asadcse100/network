<!doctype html>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admin_layouts.inc.meta')
    @include('admin.admin_layouts.inc.css')
    @yield('css')
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">

        @include('admin.admin_layouts.header')
        @include('admin.admin_layouts.sidebar')
        @yield('content')
        @include('admin.admin_layouts.footer')
        @yield('js')
    </div>
</body>

</html>