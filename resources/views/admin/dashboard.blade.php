@extends('admin.admin_layouts.app')

@section('css')
<style>
    .card {
    background-color: #fff;
    border-radius: 5px;
    border: none;
    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
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

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
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
    $total_pub = DB::table('publishers')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_aff = DB::table('affliates')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_offers = DB::table('offers')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_leads = DB::table('offer_process')->where('status', 'Approved')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_clicks = DB::table('offer_process')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_unique_clicks = DB::table('offer_process')->where('unique_', 1)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_publisher_earnings = DB::table('offer_process')->where('status', 'Approved')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->sum('publisher_earned');
    $total_vpn_clicks = DB::table('publishers')->sum('vpn_clicks');
    $total_admin_earnings = DB::table('offer_process')->where('status', 'Approved')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->sum('admin_earned');
    $total_paid_amount = DB::table('cashout_request')->where('status', 'Completed')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->sum('amount');

    $total_smartlinks = DB::table('smartlinks')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_messages = DB::table('messages')->where('sender', '!=', 'admin')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_pending_withdraw = DB::table('cashout_request')->where('status', 'Pending')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_pending_offer_process = DB::table('offer_process')->where('status', 'Pending')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_approved_offer_process = DB::table('offer_process')->where('status', 'Approved')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_tracking_domains = DB::table('domain')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_smartlink_domains = DB::table('smartlink_domain')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_waiting_offer_process = DB::table('offer_process')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('status', 'Awaited')->count();
    $total_locked_payments = DB::table('cashout_request')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->where('status', 'Locked')->count();
    $total_pending_smartlink = DB::table('smartlinks')->where('enabled', '0')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $total_pending_offer_request = DB::table('approval_request')->where('approval_status', 'Pending')->whereDate('created_at', '>=', $from_date)->whereDate('created_at', '<=', $to_date)->count();
    $top_10_offers = DB::select("SELECT  o.offer_name,o.payout,op.offer_id,o.icon_url,count(op.id) as leads FROM `offers` as o join offer_process as op on op.offer_id=o.id where op.status='Approved' group by op.offer_id order by (select count(id) from offer_process where offer_id=op.offer_id and status='Approved') desc limit 10");
    $month = date('Y-m-01 00:00:00');
    $top_10_members = DB::select("SELECT (DENSE_RANK() OVER(ORDER BY sum(r.earnings) DESC )) as rank  ,r.publisher_id,sum(r.earnings) as earnings,p.publisher_image,sum(r.lead) as leads,p.name,sum(r.clicks) as clicks,(select sum(earnings) from ranking where publisher_id=p.id) as total_earnings,(select sum(lead) from ranking where publisher_id=p.id) as total_leads,p.total_earnings as publisher_earnings FROM ranking as r,publishers as p where r.created_at>='$month' and p.id=r.publisher_id  group by r.publisher_id order by rank ");
    $recent_conversion = DB::table('offer_process as op')->select('o.id', 'o.offer_name', 'op.browser', 'op.country', 'op.ua_target', 'op.created_at', 'op.publisher_earned', 'op.affliate_manager_earnings', 'op.payout', 'o.icon_url', 'op.ip_address', 'op.admin_earned')->join('offers as o', 'o.id', '=', 'op.offer_id')->where('op.status', 'Approved')->whereDate('op.created_at', '>=', $from_date)->whereDate('op.created_at', '<=', $to_date)->orderBy('op.created_at', 'desc')->limit(10)->get();
    $publisher_revenue = json_encode(DB::select("SELECT sum(publisher_earned) as amount,sum(admin_earned) as admin_earned,date(created_at) as created_at FROM `offer_process` where status='Approved' and created_at>='$from_date' and created_at <= '$to_date' group by date(created_at)"));
    $waiting_offer_amount = DB::table('offer_process')->where('status', 'Awaited')->sum('payout');
    $total_affliate = DB::table('affliates')->count();
    $total_affliate_balance = DB::table('offer_process as op')->where('op.created_at', '>=', $from_date)->where('op.created_at', '<=', $to_date)->sum('affliate_manager_earnings');
    ?>

 <!--page-content-wrapper-->
 <div class="page-content-wrapper">
     <div class="page-content">

         <form action="{{url('/admin')}}" method="post">
            @csrf
             <div class="row mb-3">
                 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                     <label> From Date</label>
                     <input type="date" name="from_date" value="{{substr($from_date,0,10)}}" class="form-control">
                 </div>
                 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                     <label> To Date</label>
                     <input type="date" name="to_date" value="{{substr($to_date,0,10)}}" class="form-control">
                 </div>
                 <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                     <button type="submit" class="btn btn-primary " style="margin-top: 29px">Search</button>
                 </div>
             </div>
         </form>

    <div class="row ">

    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Admin Earnings</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                ${{round($total_admin_earnings,3)}}
                            </h2>
                        </div>
                        <!-- <div class="col-4 text-right">
                            <span>2.5% <i class="fa fa-arrow-up"></i></span>
                        </div> -->
                    </div>
                    <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Publisher Earnings</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            ${{round($total_publisher_earnings,3) }}
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
                        <h5 class="card-title mb-0">Affiliate Earnings</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                ${{round($total_affliate_balance,3)}}
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
                        <h5 class="card-title mb-0">Paid Amount</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                ${{round($total_paid_amount, 2)}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Offers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$total_offers}}
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
                        <h5 class="card-title mb-0">Total Publishers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$total_pub}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Affiliate Managers</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_aff}}
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
                        <h5 class="card-title mb-0">Total Clicks</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_clicks}}
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
                        <h5 class="card-title mb-0">Unique Clicks</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_unique_clicks}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-user-shield"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Vpn Clicks</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_vpn_clicks}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-assistive-listening-systems"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Leads</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_leads}}
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
                        <h5 class="card-title mb-0">Pending Leads Process</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_pending_offer_process}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Approved Leads Process</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_approved_offer_process}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-assistive-listening-systems"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Waiting Leads Process</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_waiting_offer_process}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Total Smartlinks</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_smartlinks}}
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
                        <h5 class="card-title mb-0">Pending Smartlink</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_pending_smartlink}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-assistive-listening-systems"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Pending Offer Request</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_pending_offer_request}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Pending Withdraw</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{round($total_pending_withdraw,3)}}
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
                        <h5 class="card-title mb-0">Tracking Domains</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_tracking_domains}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Smartlink Domains</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$total_smartlink_domains}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-ticket-alt"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">Locked Payment</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{round($total_locked_payments,3)}}
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
                        <h5 class="card-title mb-0">Waiting Balance from Leads</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{round($waiting_offer_amount,3)}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

         <div class="row">            
         <div class="col-lg-6">
                 <!--end row-->
                 <div class="card">
                     <div class="card-header border-bottom-0">
                         <div class="d-lg-flex align-items-center">
                             <div>
                             </div>
                             <!-- ADMIN MONTHLY REVENUE  -->
                             <!-- TOTAL PUBLSIEHR REVENUE-->
                         </div>
                     </div>
                     <div class="card-body">
                         <div id="admin_revenue"></div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-6">
                 <!--end row-->
                 <div class="card">
                     <div class="card-header border-bottom-0">
                         <div class="d-lg-flex align-items-center">
                             <div>
                             </div>
                             <!-- ADMIN MONTHLY REVENUE  -->
                             <!-- TOTAL PUBLSIEHR REVENUE-->
                         </div>
                     </div>
                     <div class="card-body">
                         <div id="publisher_revenue"></div>
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
                             <h5 class="font-weight-bold mb-0">Top 10 Offers </h5>
                         </div>
                         <!-- According to the leads -->
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
                             <p class="mb-0 text-purple">${{round($t->payout,3)}}</p>
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
                             <h5 class="font-weight-bold mb-0">Top 10 Members</h5>
                         </div>
                         <div class="dropdown ml-auto">
                             <div class="cursor-pointer text-dark font-24 dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown"><i class="bx bx-dots-horizontal-rounded"></i>
                             </div>
                             <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item" href="javaScript:;">Action</a>
                                 <a class="dropdown-item" href="javaScript:;">Another action</a>
                                 <div class="dropdown-divider"></div> <a class="dropdown-item" href="javaScript:;">Something else here</a>
                             </div>
                         </div>
                     </div>
                     <div class="support-list mt-3">
                         <?php $count = 0; ?>
                         @foreach($top_10_members as $t)
                         <?php $count++; ?>
                         @if($count < 10) 
                         <div class="media align-items-top">
                             <div class="">
                                 <img src="{{asset('uploads')}}/{{$t->publisher_image}}" width="40" height="40" class="rounded-circle" alt="" />
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
                 <div class="ml-auto">
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
                             <th>#(Id)Offer Name</th>
                             <th>Offer Payout</th>
                             <th>Pub Earning</th>
                             <th>Admin Earning</th>

                             <th>A.M Earning</th>

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
                             <td>${{round($r->payout,3)}}</td>
                             <td>${{round($r->publisher_earned,2)}}</td>
                             <td>${{round($r->admin_earned,2)}}</td>
                             <td>${{round($r->affliate_manager_earnings,2)}}</td>
                             <td>{{$r->country}}</td>
                             <td>
                                 @foreach (explode('|', $r->ua_target) as $d)
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
                                 @endforeach
                             </td>
                             <td> {{$r->browser}}</td>
                             <td>{{$r->ip_address}}</td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 </div>
 <!--start overlay-->
 <div class="overlay toggle-btn-mobile"></div>
 <!--end overlay-->
 <!--Start Back To Top Button--> 
 <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
 <!--End Back To Top Button-->

 @endsection('content')

 @section('js')
 <!-- end wrapper -->
 <script src="{{asset('cdn')}}/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>

 <script type="text/javascript">
     $(function() {
         var data = [];
         var pub = JSON.parse('<?php echo $publisher_revenue ?>');
         var admin_data = [];
         var date = [];
         for (var i = 0; i < pub.length; i++) {
             data.push(parseFloat(pub[i].amount).toFixed(2));
             date.push(pub[i].created_at);
             admin_data.push(parseFloat(pub[i].admin_earned).toFixed(2));
         }
console.log(data, pub);
         var options = {
             series: [{
                 name: 'Amount',
                 data: data
             }],
             chart: {
                 height: 400,
                 type: 'line',
                 zoom: {
                     enabled: false
                 },
                 toolbar: {
                     show: true
                 },
                 dropShadow: {
                     enabled: true,
                     top: 3,
                     left: 14,
                     blur: 4,
                     opacity: 0.10,
                 }
             },
             stroke: {
                 width: 5,
                 curve: 'smooth'
             },
             xaxis: {
                 type: 'datetime',
                 categories: date
             },
             title: {
                 text: 'Publisher Revenue',
                 align: 'left',
                 style: {
                     fontSize: "16px",
                     color: '#666'
                 }
             },
             markers: {
                 size: 4,
                 colors: ["#007bff"],
                 strokeColors: "#fff",
                 strokeWidth: 2,
                 hover: {
                     size: 7,
                 }
             },
             yaxis: {
                 title: {
                     text: 'Revenue',
                 },
             }
         };
         var chart = new ApexCharts(document.querySelector("#publisher_revenue"), options);
         
         chart.render();

         var options = {
             series: [{
                 name: 'Amount',
                 data: admin_data
             }],
             chart: {
                 height: 400,
                 type: 'line',
                 zoom: {
                     enabled: false
                 },
                 toolbar: {
                     show: true
                 },
                 dropShadow: {
                     enabled: true,
                     top: 3,
                     left: 14,
                     blur: 4,
                     opacity: 0.10,
                 }
             },
             stroke: {
                 width: 5,
                 curve: 'smooth'
             },
             xaxis: {
                 type: 'datetime',
                 categories: date,
             },
             title: {
                 text: 'Admin Revenue',
                 align: 'left',
                 style: {
                     fontSize: "16px",
                     color: '#666'
                 }
             },
             fill: {
                 type: 'gradient',
                 gradient: {
                     shade: 'light',
                     gradientToColors: ['#007bff'],
                     shadeIntensity: 1,
                     type: 'horizontal',
                     opacityFrom: 1,
                     opacityTo: 1,
                     stops: [0, 100, 100, 100]
                 },
             },
             markers: {
                 size: 4,
                 colors: ["#007bff"],
                 strokeColors: "#fff",
                 strokeWidth: 2,
                 hover: {
                     size: 7,
                 }
             },
             yaxis: {
                 title: {
                     text: 'Revenue',
                 },
             }
         };
         var chart = new ApexCharts(document.querySelector("#admin_revenue"), options);
         chart.render();
     })
 </script>
 @endsection