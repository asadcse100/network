@extends('landing.layouts.app')

@section('content')
    @if(!empty(DB::table('system_configurations')->where('type', 'service_show')->first()->value) && DB::table('system_configurations')->where('type', 'service_show')->first()->value == 'yes')
        @include('landing.layouts.inc.service')
    @endif
    @if(!empty(DB::table('system_configurations')->where('type', 'about_us_show')->first()->value) && DB::table('system_configurations')->where('type', 'about_us_show')->first()->value == 'yes')
        @include('landing.layouts.inc.about_us')
    @endif
    @if(!empty(DB::table('system_configurations')->where('type', 'our_team_show')->first()->value) && DB::table('system_configurations')->where('type', 'our_team_show')->first()->value == 'yes')
        @include('landing.layouts.inc.our_team')
    @endif
    @if(!empty(DB::table('system_configurations')->where('type', 'news_blog_show')->first()->value) && DB::table('system_configurations')->where('type', 'news_blog_show')->first()->value == 'yes')
        @include('landing.layouts.inc.news_blog')
    @endif
    @if(!empty(DB::table('system_configurations')->where('type', 'contact_show')->first()->value) && DB::table('system_configurations')->where('type', 'contact_show')->first()->value == 'yes')
        @include('landing.layouts.inc.contact')
    @endif
@endsection