@extends('affliate.affliate_layouts.app')
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
$id = Auth::guard('affliate')->id();
$my_publisher = DB::table('publishers')->where('status', 'Active')->where('affliate_manager_id', $id)->count();
$pending_publisher = DB::table('publishers')->where('status', 'Inactive')->where('affliate_manager_id', $id)->count();
$rejected_publisher = DB::table('publishers')->where('status', 'Rejected')->where('affliate_manager_id', $id)->count();
$top_10_offers = DB::select("SELECT  o.offer_name,o.payout,op.offer_id,o.icon_url,count(op.id) as leads FROM `offers` as o join offer_process as op on op.offer_id=o.id  join publishers as p  on p.id=op.publisher_id where p.affliate_manager_id='$id' and op.status='Approved'  group by op.offer_id order by (select count(id) from offer_process where offer_id=op.offer_id and status='Approved') desc limit 10");
$site = DB::table('site_settings')->first();
$my_10_members = DB::select("SELECT (DENSE_RANK() OVER(ORDER BY sum(r.earnings) DESC )) as rank  ,r.publisher_id,sum(r.earnings) as earnings,p.publisher_image,sum(r.lead) as leads,p.name,sum(r.clicks) as clicks,(select sum(earnings) from ranking where publisher_id=p.id) as total_earnings,(select sum(lead) from ranking where publisher_id=p.id) as total_leads,p.total_earnings as publisher_earnings FROM ranking as r,publishers as p where p.id=r.publisher_id  and p.affliate_manager_id='$id' group by r.publisher_id order by rank ");
$top_10_members = DB::select("SELECT (DENSE_RANK() OVER(ORDER BY sum(r.earnings) DESC )) as rank  ,r.publisher_id,sum(r.earnings) as earnings,p.publisher_image,sum(r.lead) as leads,p.name,sum(r.clicks) as clicks,(select sum(earnings) from ranking where publisher_id=p.id) as total_earnings,(select sum(lead) from ranking where publisher_id=p.id) as total_leads,p.total_earnings as publisher_earnings FROM ranking as r,publishers as p where p.id=r.publisher_id    group by r.publisher_id order by rank ");
$recent_conversion = DB::table('offer_process as op')->select('o.id', 'o.offer_name', 'op.affliate_manager_earnings', 'op.publisher_earned', 'op.ua_target', 'op.browser', 'op.country', 'op.created_at', 'op.payout', 'o.icon_url', 'op.ip_address', 'op.admin_earned')->join('offers as o', 'o.id', '=', 'op.offer_id')->join('publishers as p', 'p.id', '=', 'op.publisher_id')->where('op.status', 'Approved')->where('p.affliate_manager_id', $id)->orderBy('op.created_at', 'desc')->limit(10)->get();
$pub = DB::table('publishers')->where('affliate_manager_id', Auth::guard('affliate')->id())->get();
$array = array();
foreach ($pub as $p) {
    array_push($array, $p->id);
}
$salary = DB::table('affliate_transactions')->where('affliate_id', Auth::guard('affliate')->id())->where('created_at', '>=', date('Y-m-01 00:00:00'))->sum('amount');
?>
<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Referral Link</h4>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-primary">
                            <h5>Share this link whom you want to join under your team.</h5>
                        </div>
                        <div class="col-lg-6 m-auto text-center">
                            <div class="alert alert-success">
                                <h5>{{url('publisher/register')}}?&id={{Auth::guard('affliate')->id()}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-orange-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">My Publishers</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$my_publisher}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">Total Pending Publishers</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$pending_publisher}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">My Rejected Publishers</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    {{$rejected_publisher}}
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
                            <h5 class="card-title mb-0">My Salary</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                    ${{round($salary,2)}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->
        <div class="card-deck flex-column flex-lg-row mb-0">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="font-weight-bold mb-0">Top Offers</h5>
                        </div>
                    </div>
                    <div class="product-list mt-3">
                        @foreach($top_10_offers as $t)
                        <div class="media align-items-center -2">
                            <div class="product-img">
                                @if(!empty($t->icon_url))
                                <img src="{{asset('uploads')}}/{{$t->icon_url}}" width="35" alt="" />
                                @endif
                            </div>
                            <div class="media-body pl-3">
                                <h6 class="mb-0 font-weight-bold">{{$t->offer_name}} ({{$t->offer_id}})</h6>
                                <p class="mb-0 text-secondary">Leads : {{$t->leads}}</p>
                            </div>
                            <p class="mb-0 text-purple">${{round(($t->payout*$site->affliate_manager_salary_percentage)/100,3)}}</p>
                        </div>
                        <hr />
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="font-weight-bold mb-0">My Top Members</h5>
                        </div>
                    </div>
                    <div class="product-list mt-3">
                        <?php $count = 0; ?>
                        @foreach($my_10_members as $t)
                        <?php $count++; ?>
                        @if($count < 10) <div class="media align-items-top">
                            <div class="">
                                @if(!empty($t->publisher_image))
                                <img src="{{asset('uploads')}}/{{$t->publisher_image}}" width="40" height="40" class="rounded-circle" alt="" />
                                @endif
                            </div>
                            <div class="media-body pl-2">
                                <h6 class="mb-1 font-weight-bold">{{$t->name}} <span class="text-primary float-right font-13">Rank : {{$t->rank}}</span></h6>
                                <p class="mb-0 font-13 text-secondary">Earnings : ${{round($t->earnings,3)}}</p>
                            </div>
                    </div>
                    <hr />
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h5 class="font-weight-bold mb-0">Global Top Members</h5>
                    </div>
                </div>
                <div class="support-list mt-3">
                    <?php $count = 0; ?>
                    @foreach($top_10_members as $t)
                    <?php $count++; ?>
                    @if($count < 10) <div class="media align-items-top">
                        <div class="">
                            @if(!empty($t->publisher_image))
                            <img src="{{asset('uploads')}}/{{$t->publisher_image}}" width="40" height="40" class="rounded-circle" alt="" />
                            @endif
                        </div>
                        <div class="media-body pl-2">
                            <h6 class="mb-1 font-weight-bold">{{$t->name}} <span class="text-primary float-right font-13">Rank : {{$t->rank}}</span></h6>
                            <p class="mb-0 font-13 text-secondary">Earnings : ${{round($t->earnings,3)}}</p>
                        </div>
                </div>
                <hr />
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header border-bottom-0">
        <div class="d-flex align-items-center">
            <div>
                <h5 class="font-weight-bold mb-0">Recent Leads</h5>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped mb-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Photo</th>
                        <th>#(ID)/Offer Name</th>
                        <th>Payout</th>
                        <th>Country</th>
                        <th>Device</th>
                        <th>Browser</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recent_conversion as $r)
                    <tr>
                        <td>{{$r->created_at}}</td>
                        <td>
                            <div class="product-img bg-transparent border">
                                @if(!empty($r->icon_url))
                                <img src="{{asset('uploads')}}/{{$r->icon_url}}" width="35" alt="">
                                @endif
                            </div>
                        </td>
                        <td>#({{$r->id}}) - {{$r->offer_name}}</td>
                        <td>${{round($r->publisher_earned,2)}}</td>
                        <td>{{$r->country}}</td>
                        <td> @if($r->ua_target=='Windows')
                            <i class="lni lni-windows" title="Windows"></i>
                            @elseif($r->ua_target=='Mac')
                            <i class="fadeIn animated bx bx-laptop" title="Mac"></i>
                            @elseif($r->ua_target=='Iphone')
                            <i class="fadeIn animated bx bx-mobile-alt" title="Iphone"></i>
                            @elseif($r->ua_target=='Ipad')
                            <i class="lni lni-tab" title="Ipad"></i>
                            @elseif($r->ua_target=='Android')
                            <i class="fadeIn animated bx bx-mobile" title="Android"></i>
                            @endif
                        </td>
                        <td>
                            @if($r=='OPERA MINI')
                            <i class="lni lni-opera" title="Opera"></i>
                            @elseif($r->browser=='Chrome')
                            <i class="fadeIn animated lni lni-chrome" title="Chrome"></i>
                            @elseif($r->browser=='Firefox')
                            <i class="fadeIn animated lni lni-firefox" title="Firefox"></i>
                            @elseif($r->browser=='Internet Explorer')
                            <i class="lni lni-dribbble" title="Internet Explorer"></i>
                            @elseif($r->browser=='Safari')
                            <i class="fadeIn animated lni lni-shortcode" title="Safari"></i>
                            @elseif($r->browser=='EDGE')
                            <i class="fadeIn animated lni lni-edge" title="Edge"></i>
                            @endif
                        </td>
                        <td>{{$r->ip_address}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--start overlay-->
<div class="overlay toggle-btn-mobile"></div>
<!--end overlay-->
<!--Start Back To Top Button-->
<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

</div>
</div>
<!--end page-content-wrapper-->

@endsection('content')

@section('js')

<script src="{{asset('cdn')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

@endsection