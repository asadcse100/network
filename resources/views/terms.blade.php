@extends('layouts.app')
@section('css')
@php
$terms_conditions_meta_description = DB::table('system_configurations')->where('type', 'terms_conditions_meta_description')->first()->value;
$terms_conditions_meta_keywords = DB::table('system_configurations')->where('type', 'terms_conditions_meta_keywords')->first()->value;
$terms_conditions_description = DB::table('system_configurations')->where('type', 'terms_conditions_description')->first()->value;
@endphp

<meta name="Keywords" content="{!! $terms_conditions_meta_keywords !!}">
<meta name="Description" content="{!! $terms_conditions_meta_description !!}">
<meta property="og:image" content="">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="436">
<meta property="og:image:height" content="228">
<meta property="og:description" content="{{ $terms_conditions_description }}">
@endsection('css')
@section('content')

<!--page-content-wrapper-->
<div class="card">
    <div class="card-header">
        <h3>Terms Conditions</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            {!! $terms_conditions_description !!}
        </div> <!-- row -->
    </div>
</div>
@endsection('content')