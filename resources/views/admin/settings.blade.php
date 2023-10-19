@extends('admin.admin_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Settings </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/change-password')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::guard('admin')->id()}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Change Password</h5>
                                </div>
                                <div class="col-xxl-1 col-xl-2 col-lg-2 col-lg-3 col-sm-6 p-1">
                                    <!-- <label class="form-label">New Password</label> -->
                                    <input class="form-control" type="" name="password" placeholder="New Password">
                                </div>
                                <div class="col-xxl-1 col-xl-2 col-lg-2 col-lg-3 col-sm-6 p-1">
                                    <!-- <label class="form-label">Confirm Password</label> -->
                                    <input class="form-control" type="" name="confirm_password" placeholder="Confirm Password">
                                </div>
                                <div class="col-xxl-1 col-xl-2 col-lg-2 col-lg-3 col-sm-6 p-1">
                                    <button class="btn btn-outline-info">Change</button>
                                </div>
                            </div>
                        </form>
                        <?php
                        $data = DB::table('site_settings')->first();
                        ?>
                        <form action="{{url('admin/update-settings')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::guard('admin')->id()}}">
                            <div class="row mt-2">
                                <div class="col-lg-6">
                                    <h5>Edit Site Information</h5>
                                </div>
                                <input type="hidden" name="hidden_logo" value="@if(!empty($data->logo)){{$data->logo}}@endif">
                                <input type="hidden" name="hidden_icon" value="@if(!empty($data->icon)){{$data->icon}}@endif">
                                <div class="col-lg-12">
                                    <label class="form-label">Approve User On Signup</label>
                                    <input class="form-" type="checkbox" value="1" name="auto_signup" {{isset($data)?$data->auto_signup==1?'checked':null:null}}>
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Minimum Withdraw Amount</span>
                                    <input class="form-control" type="number" value="@if(!empty($data->minimum_withdraw_amount)){{$data->minimum_withdraw_amount}}@endif" name="minimum_withdraw_amount">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Publisher Payout %</span>
                                    <input class="form-control" type="number" value="@if(!empty($data->payout_percentage)){{$data->payout_percentage}}@endif" name="payout_percentage">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Affiliate Manager Payout %</span>
                                    <input class="form-control" type="number" value="@if(!empty($data->affliate_manager_salary_percentage)){{$data->affliate_manager_salary_percentage}}@endif" name="affliate_percentage">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Default Smartlink Domain</span>
                                    <select type="text" name="default_smartlink_domain" class="form-control" required="">
                                        @foreach (DB::table('smartlink_domain')->get() as $q)
                                        <option value="{{$q->url}}" {{isset($data)?$data->default_smartlink_domain==$q->url?'selected':null:null}}>{{$q->url}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Default Tracking Domain</span>
                                    <select type="text" name="default_tracking_domain" class="form-control" required="">
                                        @foreach (DB::table('domain')->get() as $q)
                                        <option value="{{$q->domain_name}}" {{isset($data)?$data->default_tracking_domain==$q->domain_name?'selected':null:null}}>{{$q->domain_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Select Affiliate Manager</span>
                                    <select type="text" name="affliate_manager" class="form-control" required="">
                                        @foreach (DB::table('affliates')->get() as $q)
                                        <option value="{{$q->id}}" {{isset($data)?$data->default_affliate_manager==$q->id?'selected':null:null}}>{{$q->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">When Publishers will get Paid?</span>
                                    <select type="text" name="default_payment_terms" class="form-control" required="">
                                        <option @if(!empty($data->default_payment_terms) && $data->default_payment_terms == 'net45') selected @endif value="net45">Every 45 Days</option>
                                        <option @if(!empty($data->default_payment_terms) && $data->default_payment_terms == 'net30') selected @endif value="net30">Monthly</option>
                                        <option @if(!empty($data->default_payment_terms) && $data->default_payment_terms == 'net15') selected @endif value="net15">Every 15 days</option>
                                        <option @if(!empty($data->default_payment_terms) && data->default_payment_terms == 'netweekly') selected @endif value="netweekly">Weekly</option>
                                    </select>
                                </div>


                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Vpn Api</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->vpn_api)){{$data->vpn_api}}@endif" name="vpn_api" placeholder="Vpn Api">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Vpn Check</span>
                                    <select name="vpn_check" class="form-control">
                                        <option @if(!empty($data->vpn_check)){{$data->vpn_check == 'yes' ? 'selected' : ''}}@endif value="yes">Yes</option>
                                        <option @if(!empty($data->vpn_check)){{$data->vpn_check == 'no' ? 'selected' : ''}}@endif value="no">No</option>
                                    </select>
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Host Name</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->smtp_host)){{$data->smtp_host}}@endif" name="smtp_host">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Smtp Port</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->smtp_port)){{$data->smtp_port}}@endif" name="smtp_port">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Smtp User</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->smtp_user)){{$data->smtp_user}}@endif" name="smtp_user">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Smtp Password</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->smtp_password)){{$data->smtp_password}}@endif" name="smtp_password">
                                </div>

                                @if(!empty($data->smtp_enc))
                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Smtp Encryption</span>
                                    <select name="smtp_enc" class="form-control">
                                        <option value="tls" {{$data->smtp_enc == 'tls' ? 'selected' : ''}}>tls</option>
                                        <option value="ssl" {{$data->smtp_enc == 'ssl' ? 'selected' : ''}}>ssl</option>
                                    </select>
                                </div>
                                @endif

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">From Email</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->from_email)){{$data->from_email}}@endif" name="from_email" placeholder="From Email">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Email Send From Name</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->from_name)){{$data->from_name}}@endif" name="from_name" placeholder="Email Send From Name">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">From Security</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->from_security)){{$data->from_security}}@endif" name="from_security" placeholder="From Security">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Zerobounce Api</span>
                                    <input class="form-control" type="text" value="@if(!empty($data->zerobounce_api)){{$data->zerobounce_api}}@endif" name="zerobounce_api" placeholder="Zerobounce Api">
                                </div>

                                <div class="input-group col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span class="input-group-text">Zerobounce Api Check</span>
                                    <select name="zerobounce_check" class="form-control">
                                        <option @if(!empty($data->zerobounce_check)){{$data->zerobounce_check == 'yes' ? 'selected' : ''}}@endif value="yes">Yes</option>
                                        <option @if(!empty($data->zerobounce_check)){{$data->zerobounce_check == 'no' ? 'selected' : ''}}@endif value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Logo (2000px X 699px)</label>
                                    <input class="form-control" type="file" name="logo">
                                </div>
                                @if(!empty($data->logo))
                                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <a href="{{asset('site_images')}}/{{$data->logo}}" target="_blank"><img src="{{asset('site_images')}}/{{$data->logo}}" height="100"></a>
                                </div>
                                @endif

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Icon (85px X 85px)</label>
                                    <input class="form-control" type="file" name="icon">
                                </div>
                                @if(!empty($data->icon))
                                <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <a href="{{asset('site_images')}}/{{$data->icon}}" target="_blank"><img src="{{asset('site_images')}}/{{$data->icon}}" width="100" height="100"></a>
                                </div>
                                @endif
                            </div>
                            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                <button class="btn btn-success">Save Changes</button>
                            </div>
                        </form>
                    </div>
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
</script>
@endsection('js')