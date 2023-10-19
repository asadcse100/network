@extends('admin.admin_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4>Domain Name Server Add</h4>
                    </div>
                    <div class="card-body">
                        
                        <?php
                            $ns1 = DB::table('system_configurations')->where('type', 'ns1')->first()->value;
                            $ns2 = DB::table('system_configurations')->where('type', 'ns2')->first()->value;
                            $ns3 = DB::table('system_configurations')->where('type', 'ns3')->first()->value;
                            $ns4 = DB::table('system_configurations')->where('type', 'ns4')->first()->value;
                        ?>
                        <form action="{{url('admin/update-settings')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{Auth::guard('admin')->id()}}">
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <h5>Edit Home Page Information</h5>
                                </div>
                                <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Name Server 1</label>
                                    <input class="form-control" type="text" name="ns1" value="@if(!empty($ns1)){{$ns1}}@endif">
                                </div>                              
                                <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Name Server 2</label>
                                    <input class="form-control" type="text" name="ns2" value="@if(!empty($ns2)){{$ns2}}@endif">
                                </div>                              
                                <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Name Server 3</label>
                                    <input class="form-control" type="text" name="ns3" value="@if(!empty($ns3)){{$ns3}}@endif">
                                </div>                              
                                <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
                                    <label>Name Server 4</label>
                                    <input class="form-control" type="text" name="ns4" value="@if(!empty($ns4)){{$ns4}}@endif">
                                </div>                              

                            </div>
                            
                            <div class="col-xxl-2 col-xl-3 col-lg-6 col-md-6 col-sm-12 p-1">
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