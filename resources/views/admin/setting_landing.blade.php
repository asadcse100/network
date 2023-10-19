@extends('admin.admin_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Home Landing Page Settings </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            $data = DB::table('site_settings')->first();
                            $service_show = DB::table('system_configurations')->where('type', 'service_show')->first()->value;
                            $about_us_show = DB::table('system_configurations')->where('type', 'about_us_show')->first()->value;
                            $our_team_show = DB::table('system_configurations')->where('type', 'our_team_show')->first()->value;
                            $news_blog_show = DB::table('system_configurations')->where('type', 'news_blog_show')->first()->value;
                            $contact_show = DB::table('system_configurations')->where('type', 'contact_show')->first()->value;
                            $about_heading = DB::table('system_configurations')->where('type', 'about_heading')->first()->value;
                            $about_para1 = DB::table('system_configurations')->where('type', 'about_para1')->first()->value;
                            $about_para2 = DB::table('system_configurations')->where('type', 'about_para2')->first()->value;
                            $pay_per_lead_heading = DB::table('system_configurations')->where('type', 'pay_per_lead_heading')->first()->value;
                            $pay_per_lead_details = DB::table('system_configurations')->where('type', 'pay_per_lead_details')->first()->value;
                            $pay_per_click_heading = DB::table('system_configurations')->where('type', 'pay_per_click_heading')->first()->value;
                            $pay_per_click_details = DB::table('system_configurations')->where('type', 'pay_per_click_details')->first()->value;
                            $pay_per_install_heading = DB::table('system_configurations')->where('type', 'pay_per_install_heading')->first()->value;
                            $pay_per_install_details = DB::table('system_configurations')->where('type', 'pay_per_install_details')->first()->value;
                            $cost_per_sell_heading = DB::table('system_configurations')->where('type', 'cost_per_sell_heading')->first()->value;
                            $cost_per_sell_details = DB::table('system_configurations')->where('type', 'cost_per_sell_details')->first()->value;
                            $pay_per_view_heading = DB::table('system_configurations')->where('type', 'pay_per_view_heading')->first()->value;
                            $pay_per_view_details = DB::table('system_configurations')->where('type', 'pay_per_view_details')->first()->value;
                            $play_store_logo = DB::table('system_configurations')->where('type', 'play_store_logo')->first()->value;
                            $apple_store_logo = DB::table('system_configurations')->where('type', 'apple_store_logo')->first()->value;
                            $play_store_link = DB::table('system_configurations')->where('type', 'play_store_link')->first()->value;
                            $apple_store_link = DB::table('system_configurations')->where('type', 'apple_store_link')->first()->value;
                        ?>
                        <form action="{{url('admin/landing/update-settings')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- <input type="hidden" name="id" value="{{Auth::guard('admin')->id()}}"> -->
                            <input type="hidden" name="hidden_play_store_logo" value="@if(!empty($play_store_logo)){{$play_store_logo}}@endif">
                            <input type="hidden" name="hidden_apple_store_logo" value="@if(!empty($apple_store_logo)){{$apple_store_logo}}@endif">
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <h5>Edit Home Landing Page Information</h5>
                                </div>

                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-1">
                                    <span>Service Show</span>
                                    <select name="service_show" class="form-control">
                                        <option {{$service_show == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
                                        <option {{$service_show == 'no' ? 'selected' : ''}} value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-1">
                                    <span>About Us Show</span>
                                    <select name="about_us_show" class="form-control">
                                        <option {{$about_us_show == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
                                        <option {{$about_us_show == 'no' ? 'selected' : ''}} value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-1">
                                    <span>Our Team Show</span>
                                    <select name="our_team_show" class="form-control">
                                        <option {{$our_team_show == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
                                        <option {{$our_team_show == 'no' ? 'selected' : ''}} value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-1">
                                    <span>Blog Show</span>
                                    <select name="news_blog_show" class="form-control">
                                        <option {{$news_blog_show == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
                                        <option {{$news_blog_show == 'no' ? 'selected' : ''}} value="no">No</option>
                                    </select>
                                </div>

                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-12 p-1">
                                    <span>Contact Show</span><br>
                                    <select name="contact_show" class="form-control">
                                        <option {{$contact_show == 'yes' ? 'selected' : ''}} value="yes">Yes</option>
                                        <option {{$contact_show == 'no' ? 'selected' : ''}} value="no">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>About Heading</span><br>
                                    <textarea name="about_heading" id="about_heading" cols="50" rows="5">{!! $about_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>About Para 1</span><br>
                                    <textarea name="about_para1" id="about_para1" cols="50" rows="5">{!! $about_para1 !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>About Para 2</span><br>
                                    <textarea name="about_para2" id="about_para2" cols="50" rows="5">{!! $about_para2 !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Lead Heading</span><br>
                                    <textarea name="pay_per_lead_heading" id="pay_per_lead_heading" cols="50" rows="5">{!! $pay_per_lead_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Lead Details</span><br>
                                    <textarea name="pay_per_lead_details" id="pay_per_lead_details" cols="50" rows="5">{!! $pay_per_lead_details !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Click Heading</span><br>
                                    <textarea name="pay_per_click_heading" id="pay_per_click_heading" cols="50" rows="5">{!! $pay_per_click_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Click Details</span><br>
                                    <textarea name="pay_per_click_details" id="pay_per_click_details" cols="50" rows="5">{!! $pay_per_click_details !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Install Heading</span><br>
                                    <textarea name="pay_per_install_heading" id="pay_per_install_heading" cols="50" rows="5">{!! $pay_per_install_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per Install Details</span><br>
                                    <textarea name="pay_per_install_details" id="pay_per_install_details" cols="50" rows="5">{!! $pay_per_install_details !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Cost Per Sell Heading</span><br>
                                    <textarea name="cost_per_sell_heading" id="cost_per_sell_heading" cols="50" rows="5">{!! $cost_per_sell_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Cost Per Sell Details</span><br>
                                    <textarea name="cost_per_sell_details" id="cost_per_sell_details" cols="50" rows="5">{!! $cost_per_sell_details !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per View Heading</span><br>
                                    <textarea name="pay_per_view_heading" id="pay_per_view_heading" cols="50" rows="5">{!! $pay_per_view_heading !!}</textarea>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Pay Per View Details</span><br>
                                    <textarea name="pay_per_view_details" id="pay_per_view_details" cols="50" rows="5">{!! $pay_per_view_details !!}</textarea>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Play Store Logo</span><br>
                                    <input type="text" class="form-control" name="play_store_link" value="@if(!empty($play_store_link)){{$play_store_link}}@endif"><br>
                                    <input class="form-control" type="file" name="play_store_logo">
                                    <a href="@if(!empty($play_store_link)){{$play_store_link}}@endif" target="_blank"><img src="{{asset('uploads/' . $play_store_logo)}}" height="100"></a>
                                </div>

                                <div class="col-xxl-3 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <span>Apple Store Logo</span><br>
                                    <input type="text" class="form-control" name="apple_store_link" value="@if(!empty($apple_store_link)){{$apple_store_link}}@endif"><br>
                                    <input class="form-control" type="file" name="apple_store_logo">
                                    <a href="@if(!empty($apple_store_link)){{$apple_store_link}}@endif" target="_blank"><img src="{{asset('uploads/' . $apple_store_logo)}}" height="100"></a>
                                </div>
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