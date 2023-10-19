@extends('admin.admin_layouts.app')
@section('content')

<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <h4>Subscriber of Messages</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 table-responsive ">
                                <table id="datatable" class="table table">
                                    <thead>
                                        <tr>
                                            <td>Name</td>
                                            <td>Email</td>
                                            <td>Company</td>
                                            <td>Subject</td>
                                            <td>Message</td>
                                            <td>Message Time</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subscribers as $subscriber)
                                        <tr>
                                            <td>@if(!empty($subscriber->name)){{ $subscriber->name}}@endif</td>
                                            <td>@if(!empty($subscriber->email)){{ $subscriber->email}}@endif</td>
                                            <td>@if(!empty($subscriber->company)){{ $subscriber->company}}@endif</td>
                                            <td>@if(!empty($subscriber->subject)){{ $subscriber->subject}}@endif</td>
                                            <td>@if(!empty($subscriber->message)){{ $subscriber->message}}@endif</td>
                                            <td>@if(!empty($subscriber->created_at)){{ $subscriber->created_at}}@endif</td>
                                            <td>
                                                <a href="{{url('admin/subscriber')}}/{{$subscriber->id}}" class="btn btn-danger">Reply</a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td>No Data found!</td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection