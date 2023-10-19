@extends('layouts.app')
@section('css')
@php
$privacy_policy_meta_description = DB::table('system_configurations')->where('type', 'privacy_policy_meta_description')->first()->value;
$privacy_policy_meta_keywords = DB::table('system_configurations')->where('type', 'privacy_policy_meta_keywords')->first()->value;
$privacy_policy_description = DB::table('system_configurations')->where('type', 'privacy_policy_description')->first()->value;
@endphp

<meta name="Keywords" content="{!! $privacy_policy_meta_keywords !!}">
<meta name="Description" content="{!! $privacy_policy_meta_description !!}">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="436">
<meta property="og:image:height" content="228">
<meta property="og:description" content="{{ $privacy_policy_description }}">
@endsection('css')
@section('content')

<!--page-content-wrapper-->
<div class="card">
    <div class="card-header">
        <h3>Privacy Policy</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            {!! $privacy_policy_description !!}
        </div> <!-- row -->
    </div>
</div>
@endsection('content')