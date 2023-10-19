<!doctype html>
<html lang="en">

@include('landing.layouts.inc.header')

<body>
  <!-- <div id="page-loader">
    <div class="container-mid"> <img src="{{asset('logo.png')}}" class="img-responsive" alt="image">
      <div class="spinner-container">
        <div class="css-spinner"></div>
      </div>
    </div>
  </div> -->
  <div id="main">
    @include('landing.layouts.inc.hero')
    @include('landing.layouts.inc.nav')

    @yield('content')
    
    <!-- <div class="phantom-wrapper-popups"></div> -->
    
  @include('landing.layouts.inc.footer')
  </div>
  @include('landing.layouts.inc.js')
</body>

</html>