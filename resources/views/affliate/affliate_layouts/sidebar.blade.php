<?php
$site_settings = DB::table('site_settings')->select('cdn_url')->first();
?>
<!--sidebar-wrapper-->
<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <a href="javaScript:;" class="toggle-btn"> <i class="bx bx-menu"></i></a>
        <a href="https://hasprofit.com/affliate">
            <?php $qry = DB::table('site_settings')->first(); ?>
            @if(!empty($qry->logo))
            <div class="logo-white">
                <img src="{{asset('site_images')}}/{{$qry->logo}}" class="logo-icon" alt="">
            </div>
            <div class="logo-dark">
                <img src="{{asset('site_images')}}/{{$qry->logo}}" class="logo-icon" alt="">
            </div>
            @endif
        </a>
    </div>

    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{url('/affliate')}}">
                <div class="parent-icon"><i class="bx bx-tachometer"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="{{ route('affliate.view.offer') }}">
                <div class="parent-icon"><i class="bx bx-tachometer"></i>
                </div>
                <div class="menu-title">View Offer Details</div>
            </a>
        </li>

        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="bx bx-user"></i>
                </div>
                <div class="menu-title">Publishers</div>
            </a>
            <ul>
                <li> <a href="{{url('affliate/manage-publisher')}}"><i class="bx bx-right-arrow-alt"></i>My Publisher</a>
                </li>
                <li> <a href="{{url('affliate/pending-publisher')}}"><i class="bx bx-right-arrow-alt"></i>Pending Publisher</a>
                </li>
                <li> <a href="{{url('affliate/rejected-publisher')}}"><i class="bx bx-right-arrow-alt"></i>Rejected Publisher</a>
                </li>
            </ul>
        </li>

        <?php $staff = DB::table('affliates')->where('id', Auth::guard('affliate')->id())->first(); ?>
        @if($staff->power_mode==1)
        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="lni lni-offer"></i>
                </div>
                <div class="menu-title">Offers</div>
            </a>
            <ul>
                <li> <a href="{{url('affliate/pending-offer-process')}}"><i class="bx bx-right-arrow-alt"></i>Pending Offer Process</a>
                </li>
                <li> <a href="{{url('affliate/approve-offer-process')}}"><i class="bx bx-right-arrow-alt"></i>Approve Offer Process</a>
                </li>
                <li> <a href="{{url('affliate/wait-offer-process')}}"><i class="bx bx-right-arrow-alt"></i>Waited Offer Process</a>
                </li>
                <li> <a href="{{url('affliate/reject-offer-process')}}"><i class="bx bx-right-arrow-alt"></i>Rejected Offer Process</a>
                </li>
            </ul>
        </li>
        @endif
        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="bx bx-refresh"></i>
                </div>
                <div class="menu-title">APPROVAL REQUEST</div>
            </a>
            <ul>
                <li> <a href="{{url('affliate/approval-request')}}"><i class="bx bx-right-arrow-alt"></i>Pending Offer Approval Request</a>
                </li>
                <li> <a href="{{url('affliate/approve-approval-request')}}"><i class="bx bx-right-arrow-alt"></i>Approved Offer Request</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="lni lni-link"></i>
                </div>
                <div class="menu-title">Smartlinks</div>
            </a>
            <ul>
                <li>
                    <a href="{{url('affliate/pending-smartlinks')}}"><i class="bx bx-right-arrow-alt"></i>Pending Smartlinks</a>
                </li>
                <li>
                    <a href="{{url('affliate/approve-smartlinks')}}"><i class="bx bx-right-arrow-alt"></i>Approved Smartlink</a>
                </li>
                <li>
                    <a href="{{url('affliate/rejected-smartlinks')}}"><i class="bx bx-right-arrow-alt"></i>Rejected Smartlinks</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="bx bx-message"></i>
                </div>
                <div class="menu-title">Messages</div>
            </a>
            <ul>
                <li>
                    <a href="{{url('affliate/support')}}"><i class="bx bx-right-arrow-alt"></i>Sent Message to Publisher</a>
                </li>
                <li>
                    <a href="{{url('affliate/view-publisher-messages')}}"><i class="bx bx-right-arrow-alt"></i>View Publisher Messages</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javaScript:;">
                <div class="parent-icon"><i class="lni lni-inbox"></i>
                </div>
                <div class="menu-title">Mail Room</div>
            </a>
            <ul>
                <li>
                    <a href="{{url('affliate/mail-room')}}"><i class="bx bx-right-arrow-alt"></i>Mail Room</a>
                </li>
                <li>
                    <a href="{{url('affliate/view-mail')}}"><i class="bx bx-right-arrow-alt"></i>View Send Mail</a>
                </li>
            </ul>
        </li>
        <a href="{{url('affliate/payment')}}">
            <div class="parent-icon"><i class="lni lni-revenue"></i>
            </div>
            <div class="menu-title">Salary History</div>
        </a>
        </li>
        <li>
            <a href="{{url('affliate/settings')}}">
                <div class="parent-icon"> <i class="lni lni-cog"></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
        </li>
        <li>
            <a href="{{url('affliate/2fa')}}">
                <div class="parent-icon"> <i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Two Factor Authentication</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
<!--end sidebar-wrapper-->