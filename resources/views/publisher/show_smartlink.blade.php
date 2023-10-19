@extends('publisher.publisher_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6">
                        <h5 class="mb-0">View Smartlinks</h5>
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6">
                        <div class="text-right">
                            <a href="{{url('publisher/smartlink')}}" title="Add Smartlink" class="btn btn-outline-primary">+ Create New Smartlink </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="form1" method="post" action="{{url('publisher/filter-smartlink')}}">
                    @csrf
                    <div class="row">
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
                            <div class="form-group">
                                <!-- <label>Search by Name</label> -->
                                <input type="" placeholder="Enter Smartlink Name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
                            <div class="form-group">
                                <!-- <label>Category</label> -->
                                <select class="form-control" id="category" name="category">
                                    <option value="">Select Category</option>
                                    @foreach(DB::table('category')->get() as $q)
                                    <option value="{{$q->id}}">{{$q->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
                            <!-- <label>From Date</label> -->
                            <div class="form-group">
                                <input type="date" name="from_date" class="form-control">
                            </div>
                        </div>
                        TO
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
                            <!-- <label>To Date</label> -->
                            <div class="form-group">
                                <input type="date" name="to_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
                            <button class="btn btn-success" type="btn">Search</button>

                        </div>
                        <div class="col-lg-2">
                            <textarea type="text" value="1" id="myInput" style="opacity:0">12</textarea>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="row" id="showdata">
                    @foreach($qry as $q)
                    <?php $earn_qry = DB::select("SELECT (select count(id) from offer_process where  key_='$q->key_' and status='Approved') as leads, (select count(id) from offer_process where  key_='$q->key_' ) as clicks FROM `offer_process`  WHERE key_='$q->key_' group by key_"); ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body" style="position: relative;">
                                <div class="d-lg-flex align-items-center" style="position: relative;">
                                    <div>
                                        <h5 class="font-weight-bold mb-">{{$q->name}}</h5>
                                        <span> ID({{$q->key_}})</span>
                                        <p style="font-weight:bold;" class="mb-0">{{$q->category_name}}</p>
                                        <p style="font-weight:bold;">{{$q->traffic_source}}</p>

                                    </div>
                                    <div class="overlay">
                                        <a href="javascript:;" data="{{$q->url}}" onclick="copyFunction('{{$q->url}}')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-copy text-primary">
                                                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                                                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                            </svg></a>
                                    </div>
                                </div>
                                <h3 class="text-right">${{round($q->earnings,2)}}</h3>
                                <h5 class="text-right">ECPM : ${{$q->earnings!=0 && $q->earnings!=null?round((($earn_qry[0]->leads/$q->earnings)*1000),2):0.00}}</h5>
                                <h5 class="text-right">CR: {{isset($earn[0])?$q->earnings!=0?round(($earn_qry[0]->leads/$q->earnings)*100,2):0.00:0.00}}%</h5>
                                <hr>
                                <p class=" mb-0">{{$q->created_at}} <span style="float:right"><b>Status :
                                            <?php if ($q->enabled == 0) {
                                                echo "<span class='text-info'>Pending</span>";
                                            } elseif ($q->enabled == 1) {
                                                echo "<span class='text-success'>Approved</span>";
                                            } else {
                                                echo "<span class='text-danger'>Rejected</span>";
                                            }
                                            ?></b></span></p>
                                <ul class="list-group list-group-flush mb-0">
                                    <li class="list-group-item d-flex justify-content-center align-items-center bg-transparent">
                                        <form action="{{url('publisher/reports')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="from_date" value="{{date('Y-m-d 00:00:00', strtotime('-7 days'))}}">
                                            <input type="hidden" name="to_date" value="{{date('Y-m-d 23:59:59')}}">
                                            <input type="hidden" name="key" value="{{$q->key_}}">
                                            <input type="hidden" name="type" value="smartlink">
                                            <button type="submit" class="btn mt-3"><i class="bx bx-file reporticon bg-success" title="Reports"></i></button>
                                        </form>
                                        <a href="javascript:;" data="{{$q->smart_id}}" class="deleteBtn"><i class="lni lni-trash bg-danger" title="delete"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection('content')

@section('js')
<script type="text/javascript">
    $(function() {
        @if(Session::has('success'))
        Swal.fire({
            title: '{{Session::get("success")}}',
            confirmButtonText: 'Ok'
        })
        @endif
    })

    function copyFunction(e) {
        document.getElementById("myInput").value = e;
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Smartlink Copied");
    }
</script>
<script>
    $(function() {

        $('#showdata').on('click', '.deleteBtn', function() {
            var id = $(this).attr('data');
            var r = confirm("Do you want to remove this Paylink!");
            if (r == true) {
                $.ajax({
                    method: 'get',
                    data: {
                        id: id
                    },
                    url: '<?php echo url('publisher/delete-smartlink') ?>',
                    async: false,
                    success: function(res) {
                        window.location.reload();
                    },
                    error: function() {
                        alert('error');
                    }
                })
            }
        })
    })

    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        document.execCommand("copy");
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copied: " + copyText.value;
    }

    function outFunc() {
        var tooltip = document.getElementById("myTooltip");
        tooltip.innerHTML = "Copy to clipboard";
    }
</script>
@endsection('js')