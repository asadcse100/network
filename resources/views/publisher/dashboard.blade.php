@extends('publisher.publisher_layouts.app')
@section('css')
<style>
    .card {
        background-color: #fff;
        border-radius: 5px;
        border: none;
        position: relative;
        margin-bottom: 30px;
        box-shadow: 0 0.46875rem 2.1875rem rgba(90, 97, 105, 0.1), 0 0.9375rem 1.40625rem rgba(90, 97, 105, 0.1), 0 0.25rem 0.53125rem rgba(90, 97, 105, 0.12), 0 0.125rem 0.1875rem rgba(90, 97, 105, 0.1);
    }

    .l-bg-cherry {
        background: linear-gradient(to right, #493240, #f09) !important;
        color: #fff;
    }

    .l-bg-blue-dark {
        background: linear-gradient(to right, #373b44, #4286f4) !important;
        color: #fff;
    }

    .l-bg-green-dark {
        background: linear-gradient(to right, #0a504a, #38ef7d) !important;
        color: #fff;
    }

    .l-bg-orange-dark {
        background: linear-gradient(to right, #a86008, #ffba56) !important;
        color: #fff;
    }

    .card .card-statistic-3 .card-icon-large .fas,
    .card .card-statistic-3 .card-icon-large .far,
    .card .card-statistic-3 .card-icon-large .fab,
    .card .card-statistic-3 .card-icon-large .fal {
        font-size: 110px;
    }

    .card .card-statistic-3 .card-icon {
        text-align: center;
        line-height: 30px;
        margin-left: 10px;
        color: #000;
        position: absolute;
        right: 30px;
        top: 10px;
        opacity: 0.1;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }

    .l-bg-green {
        background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
        color: #fff;
    }

    .l-bg-orange {
        background: linear-gradient(to right, #f9900e, #ffba56) !important;
        color: #fff;
    }

    .l-bg-cyan {
        background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
        color: #fff;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

@endsection
@section('content')

<?php
$id = Auth::guard('publisher')->id();
?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-user-shield"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Unique Clicks</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 uniqueClicks">
                                    0
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-assistive-listening-systems"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Today Leads</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 today_leads">
                                    0
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Today ECPM</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0 today_ecpm">
                                    $0
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Today Earnings</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    ${{$td_epc}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-mouse-pointer"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Clicks</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$click_count}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">CTR</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$ctr}}%
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-green-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">EPC</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    ${{$epc}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-mouse-pointer"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Vpn Click</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    @if(!empty($publisher_table->vpn_clicks)){{$publisher_table->vpn_clicks}}@endif
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--end row-->

        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="d-lg-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-2 mb-lg-0">Clicks | Conversions | Earnings</h5>
                    </div>
                    <div class="ml-lg-auto mb-2 mb-lg-0">
                        <div class="btn-group-round">

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="differencechart"></div>
            </div>
        </div>
        @if(Auth::guard('publisher')->user()->expert_mode==1)

        <!----- New offers ----->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Featured Offers</h5>
            </div>
            <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
            <!-- banner -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8033965373394508" data-ad-slot="4705504298" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
            <div class="card-body">
                @if(Auth::guard('publisher')->user()->expert_mode==1)
                <div class="container my-4" style="border-radius: 12px;border: 2px solid #e2eaef;box-shadow: 2px;">
                    <!--Carousel Wrapper-->
                    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">
                        <!--Controls-->
                        <div class="controls-top">
                            <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                            <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                        </div>
                        <!--/.Controls-->
                        <!--Indicators-->
                        <ol class="carousel-indicators">
                            <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                            <li data-target="#multi-item-example" data-slide-to="1"></li>
                            <li data-target="#multi-item-example" data-slide-to="2"></li>
                        </ol>
                        <!--/.Indicators-->
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <?php
                                    $id = Auth::guard('publisher')->id();
                                    $qry = DB::select("SELECT o.offer_name,ap.approval_status,o.offer_type,c.category_name,o.countries,o.payout_percentage,o.payout_type,o.payout,o.ua_target,o.status,o.clicks,o.conversion,o.browsers,o.incentive_allowed,o.smartlink,o.magiclink,o.native,o.lockers,o.featured_offer,o.preview_url,o.verticals,o.id as oid,(select GROUP_CONCAT(pub.name) from offers_publisher as of join publishers as pub on pub.id=of.publisher_id where of.offer_id=o.id) as publisher_name  FROM `offers`  as o left join approval_request as ap on ap.offer_id=o.id and ap.publisher_id='$id'   left join category as c on c.id=o.category_id where   o.status='Active' and o.offer_type!='special' and o.lockers=1  ORDER BY RAND() limit 3");
                                    $site = DB::table('site_settings')->first();
                                    foreach ($qry as $q) { ?>
                                        <div class="col-md-4" style="border-radius: 12px;">
                                            <center>
                                                <div class="card mb-2">
                                                    @if(!empty($q->preview_url))
                                                    <img style="height:236px;" class="card-img-top" src="uploads/{{$q->preview_url}}" alt="Card image cap">
                                                    @endif
                                                    <div class="card-body">
                                                        <h6 style="font-weight:bold;" class="card-title">{{$q->offer_name}}</h6>
                                                        <p class="card-text"><br>{{$q->category_name}}

                                                            <br>{{$q->verticals}}
                                                        </p>
                                                        <?php $device = explode('|', $q->ua_target);
                                                        foreach ($device as $d) {
                                                        ?>
                                                            @if($d=='Windows')
                                                            <i class="lni lni-windows" title="Windows"></i>
                                                            @elseif($d=='Mac')
                                                            <i class="fadeIn animated bx bx-laptop" title="Mac"></i>
                                                            @elseif($d=='Iphone')
                                                            <i class="fadeIn animated bx bx-mobile-alt" title="Iphone"></i>
                                                            @elseif($d=='Ipad')
                                                            <i class="lni lni-tab" title="Ipad"></i>
                                                            @elseif($d=='Android')
                                                            <i class="fadeIn animated bx bx-mobile" title="Android"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <br>
                                                        <?php $browser = explode('|', $q->browsers);
                                                        foreach ($browser as $d) {
                                                        ?>
                                                            @if($d=='OPERA MINI')
                                                            <i style="color:#17a2b8;" class="lni lni-opera" title="Opera"></i>
                                                            @elseif($d=='Chrome')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-chrome" title="Chrome"></i>
                                                            @elseif($d=='Firefox')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-firefox" title="Firefox"></i>
                                                            @elseif($d=='Internet Explorer')
                                                            <i style="color:#17a2b8;" class="lni lni-dribbble" title="Internet Explorer"></i>
                                                            @elseif($d=='Safari')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-shortcode" title="Safari"></i>
                                                            @elseif($d=='EDGE')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-edge" title="Edge"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <p class="item-price">
                                                        <h3 style="color: #e83fb4;font-weight: bold;"> <?php if ($q->payout_type == 'revshare') { ?>
                                                                RevShare
                                                            <?php } else {
                                                            ?>
                                                                ${{round(($q->payout*$q->payout_percentage)/100,2)}}
                                                                <!--${{round(($q->payout),2)}}-->
                                                            <?php      } ?>
                                                        </h3>
                                                        </p>

                                                        <a class="btn btn-primary" href="{{url('publisher/offers-details')}}/{{$q->oid}}" target="_blank">Get Details</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <?php
                                    $id = Auth::guard('publisher')->id();
                                    $qry = DB::select("SELECT o.offer_name,ap.approval_status,o.offer_type,c.category_name,o.countries,o.payout_type,o.payout_percentage,o.payout,o.ua_target,o.status,o.clicks,o.conversion,o.browsers,o.incentive_allowed,o.smartlink,o.magiclink,o.native,o.lockers,o.featured_offer,o.preview_url,o.verticals,o.id as oid,(select GROUP_CONCAT(pub.name) from offers_publisher as of join publishers as pub on pub.id=of.publisher_id where of.offer_id=o.id) as publisher_name  FROM `offers`  as o left join approval_request as ap on ap.offer_id=o.id and ap.publisher_id='$id'   left join category as c on c.id=o.category_id where   o.status='Active' and o.offer_type!='special' and o.lockers=1  ORDER BY RAND() limit 3");
                                    $site = DB::table('site_settings')->first();
                                    foreach ($qry as $q) { ?>
                                        <div class="col-md-4" style="border-radius: 12px;">
                                            <center>
                                                <div class="card mb-2">
                                                    @if(!empty($q->preview_url))
                                                    <img style="height:236px;" class="card-img-top" src="uploads/{{$q->preview_url}}" alt="Card image cap">
                                                    @endif
                                                    <div class="card-body">
                                                        <h6 style="font-weight:bold;" class="card-title">{{$q->offer_name}}</h6>
                                                        <p class="card-text"><br>{{$q->category_name}}

                                                            <br>{{$q->verticals}}
                                                        </p>
                                                        <?php $device = explode('|', $q->ua_target);
                                                        foreach ($device as $d) {
                                                        ?>
                                                            @if($d=='Windows')
                                                            <i class="lni lni-windows" title="Windows"></i>
                                                            @elseif($d=='Mac')
                                                            <i class="fadeIn animated bx bx-laptop" title="Mac"></i>
                                                            @elseif($d=='Iphone')
                                                            <i class="fadeIn animated bx bx-mobile-alt" title="Iphone"></i>
                                                            @elseif($d=='Ipad')
                                                            <i class="lni lni-tab" title="Ipad"></i>
                                                            @elseif($d=='Android')
                                                            <i class="fadeIn animated bx bx-mobile" title="Android"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <br>
                                                        <?php $browser = explode('|', $q->browsers);
                                                        foreach ($browser as $d) {
                                                        ?>
                                                            @if($d=='OPERA MINI')
                                                            <i style="color:#17a2b8;" class="lni lni-opera" title="Opera"></i>
                                                            @elseif($d=='Chrome')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-chrome" title="Chrome"></i>
                                                            @elseif($d=='Firefox')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-firefox" title="Firefox"></i>
                                                            @elseif($d=='Internet Explorer')
                                                            <i style="color:#17a2b8;" class="lni lni-dribbble" title="Internet Explorer"></i>
                                                            @elseif($d=='Safari')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-shortcode" title="Safari"></i>
                                                            @elseif($d=='EDGE')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-edge" title="Edge"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <p class="item-price">
                                                        <h3 style="color: #e83fb4;font-weight: bold;"> <?php if ($q->payout_type == 'revshare') { ?>
                                                                RevShare
                                                            <?php } else {
                                                            ?>
                                                                ${{round(($q->payout*$q->payout_percentage)/100,2)}}
                                                                <!--${{round(($q->payout),2)}}-->
                                                            <?php      } ?>
                                                        </h3>
                                                        </p>

                                                        <a class="btn btn-primary" href="{{url('publisher/offers-details')}}/{{$q->oid}}" target="_blank">Get Details</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Third slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <?php
                                    $id = Auth::guard('publisher')->id();
                                    $qry = DB::select("SELECT o.offer_name,ap.approval_status,o.offer_type,c.category_name,o.countries,o.payout_type,o.payout_percentage,o.payout,o.ua_target,o.status,o.clicks,o.conversion,o.browsers,o.incentive_allowed,o.smartlink,o.magiclink,o.native,o.lockers,o.featured_offer,o.preview_url,o.verticals,o.id as oid,(select GROUP_CONCAT(pub.name) from offers_publisher as of join publishers as pub on pub.id=of.publisher_id where of.offer_id=o.id) as publisher_name  FROM `offers`  as o left join approval_request as ap on ap.offer_id=o.id and ap.publisher_id='$id'   left join category as c on c.id=o.category_id where   o.status='Active' and o.offer_type!='special' and o.lockers=1  ORDER BY RAND() limit 3");
                                    $site = DB::table('site_settings')->first();
                                    foreach ($qry as $q) { ?>
                                        <div class="col-md-4" style="border-radius: 12px;">
                                            <center>
                                                <div class="card mb-2">
                                                    @if(!empty($q->preview_url))
                                                    <img style="height:236px;" class="card-img-top" src="uploads/{{$q->preview_url}}" alt="Card image cap">
                                                    @endif
                                                    <div class="card-body">
                                                        <h6 style="font-weight:bold;" class="card-title">{{$q->offer_name}}</h6>
                                                        <p class="card-text"><br>{{$q->category_name}}
                                                            <br>{{$q->verticals}}
                                                        </p>
                                                        <?php $device = explode('|', $q->ua_target);
                                                        foreach ($device as $d) {
                                                        ?>
                                                            @if($d=='Windows')
                                                            <i class="lni lni-windows" title="Windows"></i>
                                                            @elseif($d=='Mac')
                                                            <i class="fadeIn animated bx bx-laptop" title="Mac"></i>
                                                            @elseif($d=='Iphone')
                                                            <i class="fadeIn animated bx bx-mobile-alt" title="Iphone"></i>
                                                            @elseif($d=='Ipad')
                                                            <i class="lni lni-tab" title="Ipad"></i>
                                                            @elseif($d=='Android')
                                                            <i class="fadeIn animated bx bx-mobile" title="Android"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <br>

                                                        <?php $browser = explode('|', $q->browsers);
                                                        foreach ($browser as $d) {
                                                        ?>
                                                            @if($d=='OPERA MINI')
                                                            <i style="color:#17a2b8;" class="lni lni-opera" title="Opera"></i>
                                                            @elseif($d=='Chrome')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-chrome" title="Chrome"></i>
                                                            @elseif($d=='Firefox')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-firefox" title="Firefox"></i>
                                                            @elseif($d=='Internet Explorer')
                                                            <i style="color:#17a2b8;" class="lni lni-dribbble" title="Internet Explorer"></i>
                                                            @elseif($d=='Safari')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-shortcode" title="Safari"></i>
                                                            @elseif($d=='EDGE')
                                                            <i style="color:#17a2b8;" class="fadeIn animated lni lni-edge" title="Edge"></i>
                                                            @endif
                                                        <?php } ?>
                                                        <p class="item-price">
                                                        <h3 style="color: #e83fb4;font-weight: bold;"> <?php if ($q->payout_type == 'revshare') { ?>
                                                                RevShare
                                                            <?php } else {
                                                            ?>
                                                                ${{round(($q->payout*$q->payout_percentage)/100,2)}}
                                                                <!--${{round(($q->payout),2)}}-->
                                                            <?php      } ?>
                                                        </h3>
                                                        </p>

                                                        <a class="btn btn-primary" href="{{url('publisher/offers-details')}}/{{$q->oid}}" target="_blank">Get Details</a>
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                            <!--/.Third slide-->
                        </div>
                        <!--/.Slides-->
                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
                @endif
            </div>
        </div>
        <!--------New Offer Ends -------->
        @endif
        @if(Auth::guard('publisher')->user()->expert_mode==1)
        <?php
        $recent_conversion = DB::table('offer_process as op')->select('o.id', 'o.offer_name', 'op.browser', 'op.country', 'op.publisher_earned', 'op.created_at', 'op.ua_target', 'op.payout', 'o.icon_url', 'op.ip_address')->join('offers as o', 'o.id', '=', 'op.offer_id')->where('op.status', 'Approved')->where('op.publisher_id', $id)->orderBy('op.created_at', 'desc')->limit(10)->get();
        ?>
        <div class="card">
            <div class="card-header border-bottom-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">Recent Conversions</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th>Preview</th>
                                <th>(#ID)Offer Name</th>
                                <th>Payout</th>
                                <th>Date</th>
                                <th>Country</th>
                                <th>Browser</th>
                                <th>Device</th>
                                <th>IP Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_conversion as $r)
                            <tr>
                                <td>
                                    <div class="product-img bg-transparent border">
                                        @if(!empty($r->icon_url))
                                        <img src="uploads/{{$r->icon_url}}" width="35" alt="">
                                        @endif
                                    </div>
                                </td>
                                <td>({{$r->id}}) - {{$r->offer_name}}</td>
                                <td>${{round($r->publisher_earned,2)}}</td>
                                <td>{{$r->created_at}}</td>
                                <td>{{$r->country}}</td>
                                <td> {{$r->browser}}</td>
                                <td>
                                    <?php $device = explode('|', $r->ua_target);
                                    foreach ($device as $d) {
                                    ?>
                                        @if($d=='Windows')
                                        <i class="lni lni-windows" title="Windows"></i>
                                        @elseif($d=='Mac')
                                        <i class="fadeIn animated bx bx-laptop" title="Mac"></i>
                                        @elseif($d=='Iphone')
                                        <i class="fadeIn animated bx bx-mobile-alt" title="Iphone"></i>
                                        @elseif($d=='Ipad')
                                        <i class="lni lni-tab" title="Ipad"></i>
                                        @elseif($d=='Android')
                                        <i class="fadeIn animated bx bx-mobile" title="Android"></i>
                                        @endif
                                    <?php } ?>
                                </td>
                                <td>{{$r->ip_address}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<div class="overlay toggle-btn-mobile"></div>
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>

@endsection('content')

@section('js')

<script type="text/javascript">
    <?php
    $month_date = date('Y-m-01 00:00:00');
    $diff_qry = DB::select("select (select count(id) from offer_process as ol  where ol.status='Approved' and date(ol.created_at)=date(op.created_at) 
    and ol.publisher_id='$id' and created_at>='$month_date') as leads ,(select count(id) from offer_process as ol 
    where  date(ol.created_at)=date(op.created_at) and ol.publisher_id='$id' and created_at>='$month_date') as clicks,(select sum(publisher_earned) from offer_process as ol 
    where  ol.publisher_id='$id' and ol.status='Approved' and date(ol.created_at)=date(op.created_at) 
    and created_at>='$month_date') as earnings ,op.created_at from offer_process as op  where op.publisher_id='$id' 
    and created_at>='$month_date'  GROUP by date(op.created_at) order by op.created_at asc");
    $diff_qry = json_encode($diff_qry);
    ?>

    $(function() {
        url = '{{config("app.url")}}' + '/cdn/site/assets/ringtone/welcome.ogg';
        playSound(url);

        function playSound(url) {
            const audio = new Audio(url);
            audio.play();
        }

        setInterval(GetLiveClicks, 3000);
        let clicks = [];
        let leads = [];
        let date = [];
        let earnings = [];
        var qry = JSON.parse('@if(!empty($diff_qry)){{ $diff_qry }}@endif');

        for (var i = 0; i < qry.length; i++) {
            if (qry[i].clicks == null) {
                clicks.push(0);
            } else {
                clicks.push(qry[i].clicks);
            }

            if (qry[i].leads == null) {
                leads.push(0);
            } else {
                leads.push(qry[i].leads);
            }
            date.push(qry[i].created_at);
            if (qry[i].earnings == null) {
                earnings.push(0);
            } else {
                earnings.push(parseFloat(qry[i].earnings).toFixed(2));
            }
        }

        "use strict";
        var optionsLine = {
            chart: {
                height: 300,
                type: 'line',
                zoom: {
                    enabled: true
                },
                dropShadow: {
                    enabled: true,
                    top: 8,
                    left: 2,
                    blur: 3,
                    opacity: 0.1,
                }
            },
            animations: {
                enabled: true,
                easing: 'linear',
                dynamicAnimation: {
                    speed: 1000
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            colors: ["#ff007b", '#265ED7', '#00ff66'],
            series: [{
                name: "Clicks",
                data: clicks,

            }, {
                name: "Conversions",
                data: leads
            }, {
                name: "Earnings",
                data: earnings
            }],
            title: {
                text: 'This Month',
                align: 'left',
                offsetY: 25,
                offsetX: 20
            },
            subtitle: {
                text: 'Statistics',
                offsetY: 55,
                offsetX: 20
            },
            markers: {
                size: 4,
                strokeWidth: 0,
                hover: {
                    size: 7
                }
            },
            grid: {
                show: true,
                padding: {
                    bottom: 0
                }
            },

            labels: date,
            xaxis: {
                tooltip: {
                    enabled: false
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                offsetY: -20
            }
        }
        var chartLine = new ApexCharts(document.querySelector('#differencechart'), optionsLine);
        chartLine.render();

        GetLiveClicks();
        var lead = 0;

        function GetLiveClicks() {
            $.ajax({
                method: 'get',
                url: "{{url('publisher/clicks-graph')}}",
                'dataType': 'json',
                success: function(res) {
                    if (res[0].today_leads > lead) {
                        url = '{{config("app.url")}}' + '/cdn/site/assets/assets/ringtone/lead.ogg';
                        playSound(url);
                    }
                    lead = res[0].today_leads;
                    var earnings = (res[0] != undefined && res[0].total_earnings != null ? (parseFloat(res[0].total_earnings)).toFixed(2) : '0.00');
                    $('.uniqueClicks').html(res[0] != undefined ? res[0].unique_clicks : 0);
                    $('.today_leads').html(res[0] != undefined ? res[0].today_leads : 0);
                    i
                    $('.today_earnings').html('$' + earnings);
                    $('.today_ecpm').html(res[0].today_leads != undefined && res[0].today_leads != 0 ? '$' + parseFloat(((res[0].total_earnings / res[0].today_leads) * 1000)).toFixed(3) : '$0.00')
                }
            })
        }
    });
</script>
@endsection('js')