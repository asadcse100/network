<section id="hero" class="hero hero-2">
  <div class="front-content page-enter-animated">
    <div class="container-mid">
      <div class="inner 3d-hover">
        <!-- <img class="img-responsive logo" src="{{asset('logo.png')}}" alt="logo"> -->
        @php
        $qry = DB::table('site_settings')->first();
        $site_motto_heading = DB::table('system_configurations')->where('type', 'site_motto_heading')->first()->value;
        $site_motto = DB::table('system_configurations')->where('type', 'site_motto')->first()->value;
        @endphp
        <img class="img-responsive logo" src="@if(!empty($qry->logo)){{asset('site_images')}}/{{$qry->logo}}@endif" width="380" alt="@if(!empty($qry->logo)){{$qry->logo}}@endif" />
        <h1>{!! $site_motto_heading !!}</h1>
        <p>{!! $site_motto !!}</p>
      </div>
    </div>
    <div class="scroll-down"></div>
    <div class="controls"> <i class="volume-button fa fa-volume-up"></i> <i class="pause-button ti-control-pause"></i> </div>
  </div>
  <div class="background-content page-enter-animated">
    <div class="level-1">
      <div class="bg-overlay"></div>
      <div class="bg-pattern"></div>
      <div id="canvas"><canvas class="bg-effect layer" data-depth="0.2"></canvas></div>
    </div>
    <div class="level-2">
      <div class="dzsparallaxer auto-init allbody" data-options="{mode_scroll: 'fromtop', animation_duration: '2' , direction: 'reverse'}">
        <div class="dzsparallaxer--target">
          <div class="bg-image layer" data-depth="0.04"></div>
          <div class="bg-video layer" data-depth="0.04"></div>
          <div class="bg-color layer" data-depth="0.04"></div>
        </div>
      </div>
    </div>
  </div>
</section>