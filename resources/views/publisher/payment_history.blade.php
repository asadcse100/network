@extends('publisher.publisher_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card" style="box-shadow: 0 4px 8px 0 rgb(146 140 175);transition: 0.3s;border: 1px solid #ffefef;">
                    <div class="card-body">
                        <center>
                            <br><br>

                            <?php $id = Auth::guard('publisher')->id();
                            $date = date('Y-m-01 00:00:00');
                            $qry = DB::select("select sum(amount) as balance from publisher_transactions where publisher_id='$id'"); ?>

                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body overflow-hidden">

                                                <h5 class="card-title mb-0">Your Balance Remaining</h5>
                                                <h1>${{round($qry[0]?$qry[0]->balance:0,2)}}</h1>
                                            </div>
                                            <div class="text-primary">
                                                <i class="ri-exchange-dollar-fill font-size-40"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: {{round($qry[0]?$qry[0]->balance:0,2)}}%"></div>
                            </div>
                            <br>

                            <p class="card-title-desc">From our Payments Department you can see all your payment histroy</p>
                            <center>
                                <div class="table-responsive ">
                                    <table class="table table-bordered table-striped w-100" id="example">
                                        <thead>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Payment Detail</th>
                                            <th>Payment Cycle</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            @foreach(DB::table('cashout_request')->where('affliate_id', Auth::guard('publisher')->id())->get() as $q)
                                            <tr>
                                                <td>{{$q->created_at}}</td>
                                                <td>{{round($q->amount,2)}}</td>
                                                <td>{{$q->method}}</td>
                                                <td>{{$q->payment_details}}</td>
                                                <td>{{$q->payterm}}</td>
                                                <td>{{$q->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </center>
                        </center>
                    </div>
                </div>

                @endsection('content')