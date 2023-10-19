        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javaScript:;" class="toggle-btn"> <i class="bx bx-menu"></i></a>
                    <?php $qry = DB::table('site_settings')->first(); ?>
                    @if(!empty($qry))
                    <div class="logo-white">
                        <a href="{{Route('home')}}" target="_blank"><img src="{{asset('site_images')}}/{{$qry->logo}}" class="logo-icon" alt="{{$qry->logo}}"></a>
                    </div>
                    <div class="logo-dark">
                        <a href="{{Route('home')}}" target="_blank"><img src="{{asset('site_images')}}/{{$qry->logo}}" class="logo-icon" alt="{{$qry->logo}}"></a>
                    </div>
                    @else
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{Route('home')}}">Home</a>
                        </li>
                    </ul>
                    @endif
                </div>

                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">
                        <?php
                        $email = 'admin';
                        $qry = DB::select("select *,(select count(id) from messages where receiver='$email') as total_messages,(select count(id) from messages where receiver='$email' and is_read=0) as unread_messages from messages where receiver='$email' order by is_read,created_at limit 6");
                        ?>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javaScript:;" data-toggle="dropdown"> <span class="msg-count">{{isset($qry[0])?$qry[0]->unread_messages:0}}</span>
                                <i class="bx bx-comment-detail vertical-align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javaScript:;">
                                    <div class="msg-header">

                                        <h6 class="msg-header-title">{{isset($qry[0])?$qry[0]->total_messages:0}}</h6>
                                        <p class="msg-header-subtitle">Admin Messages</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    @foreach($qry as $q)
                                    <a class="dropdown-item" href="{{url('admin/view-message')}}/{{$q->id}}">
                                        <div class="media align-items-center">
                                            <div class=" ml-1 mr-3">

                                                @if($q->is_read==0)
                                                <i class="lni lni-envelope text-primary"></i>
                                                @else

                                                <div class="icon-base"> <i class="fadeIn animated bx bx-envelope-open text-primary"></i>
                                                </div>
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">{{$q->sender}} <span class="msg-time float-right">{{$q->created_at}}
                                                    </span></h6>
                                                <p class="msg-info">{{$q->subject}}</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <a href="{{url('admin/messages')}}">
                                    <div class="text-center msg-footer">View All Messages</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;" data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="user-name mb-0">{{Auth::guard('admin')->user()->name}}</p>
                                        <p class="designattion mb-0">Available</p>
                                    </div>
                                    <img src="{{ asset('cdn/site/dashboard_assets/images/avatars/avatar-11.png') }}" class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{url('admin/settings')}}"><i class="bx bx-cog"></i><span>Settings</span></a>

                                <a class="dropdown-item" href="#" onclick="event.preventDefault();document.querySelector('#logout-form').submit();">
                                    <i class="bx bx-lock"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <div class="dropdown-divider mb-0"></div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--end header-->