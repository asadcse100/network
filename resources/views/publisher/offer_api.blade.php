@extends('publisher.publisher_layouts.app')
@section('content')
<style type="text/css">
    li {
        list-style: none;
    }
</style>

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3>Offer API</h3>
                    </div>
                    <div class="card-body">
                        <h6>
                            If you want to get all offers than simply use the link shown below
                        </h6>
                        <div class="alert text-center alert-success">
                            <h5>
                                {{url('api').'?pubid='}}{{Auth::guard('publisher')->id()}}
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3>Offer API Customized</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert text-center alert-success">
                            <h5>
                                {{url('api').'?pubid='}}{{Auth::guard('publisher')->id()}}&category_id={id}&browser={browser}&device={device}
                            </h5>
                        </div>
                        <div class="row mt-5">
                            <div class="col-lg-4">
                                <h5>Available Categories </h5>
                                <ul>
                                    @foreach (DB::table('category')->get() as $c)
                                        <li> {{$c->category_name }} <mark><b class="text-danger">{{$c->id}}</b></mark></li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="col-lg-4">
                                <h5>Available Browsers </h5>
                                <ul>
                                    <li> <mark><b class="text-danger">Chrome</b></mark></li>
                                    <li> <mark><b class="text-danger">Safari</b></mark></li>
                                    <li> <mark><b class="text-danger">Firefox</b></mark></li>
                                    <li> <mark><b class="text-danger">Edge</b></mark></li>
                                    <li> <mark><b class="text-danger">Opera Mini</b></mark></li>
                                    <li> <mark><b class="text-danger">Internet Explorer</b></mark></li>
                                </ul>
                            </div>

                            <div class="col-lg-4">
                                <h5>Available Device </h5>
                                <ul>
                                    <li> <mark><b class="text-danger">Windows</b></mark></li>
                                    <li> <mark><b class="text-danger">Mac</b></mark></li>
                                    <li> <mark><b class="text-danger">Android</b></mark></li>
                                    <li> <mark><b class="text-danger">Iphone</b></mark></li>
                                    <li> <mark><b class="text-danger">Ipad</b></mark></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection('content')