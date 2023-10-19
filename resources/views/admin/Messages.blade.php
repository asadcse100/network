@extends('admin.admin_layouts.app')
@section('content')

<?php
if ($reply != '') {
  $qry = DB::table('messages')->where('id', $reply)->first();
} ?>
<!--page-content-wrapper-->
<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>Create New Message</h3>
          </div>
          <div class="card-body">
            <form action="{{url('admin/send-message')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>To</label>
                    <select required="" class="selectpicker w-100" name="publisher[]" multiple data-actions-box="true">
                      @foreach (DB::table('publishers')->get() as $q)
                      <option value="{{$q->email}}" {{$reply!=''?$q->email==$qry->sender?'selected':null:null}}> {{$q->name}} // {{$q->email}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="text" name="subject" class="form-control" value="{{@$qry->subject}}" required="">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Message</label>
                    <textarea type="text" name="message" id="summernote" class="form-control" required=""></textarea>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Screenshot (Optional)</label>
                    <input type="file" name="screenshot" class="form-control">
                  </div>
                </div>
                <div class="col-lg-12">
                  <button type="submit" class="btn btn-primary">Send</button>
                  @if ($reply != '')
                  <a class="btn btn-success" href="{{url('admin/messages')}}">Go Back</a>
                  @endif
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      @if($reply=='')
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h3>View Messages</h3>
          </div>
          <div class="card-body table-responsive ">
            <table class="table " id="example">
              <thead>
                <th>Message Id</th>
                <th>Sender</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Action</th>
              </thead>
              @foreach(DB::table('messages as m')->where('m.receiver', 'admin')->orderBy('m.id', 'desc')->get() as $q)
              <tr>
                <td>{{$q->id}}</td>
                <td>{{$q->sender}}</td>
                <td>{{$q->subject}}</td>
                <td>{{$q->created_at}}</td>
                <td>
                  <a href="{{url('admin/view-message')}}/{{$q->id}}" class="btn btn-primary">View</a>
                  <a href="{{url('admin/messages')}}/{{$q->id}}" class="btn btn-danger">Reply</a>
                </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>

@endsection('content')

@section('js')
<script type="text/javascript">
  $(function() {
    $('#summernote').summernote({
      height: 150
    });

    @if(Session::has('success'))
    Swal.fire({
      title: '{{Session::get("success")}}',
      confirmButtonText: 'Ok'
    })
    @endif
  })
</script>
@endsection