@extends('publisher.publisher_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
  <div class="page-content">
    <?php
    if ($reply != '') {
      $qry = DB::table('messages')->where('id', $reply)->first();
    } ?>

    <div class="card">
      <div class="col-lg-12">
        <div class="card-header">
          <h3>Create New Message</h3>
        </div>
        <div class="card-body">
          <form action="{{url('publisher/send-message')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-lg-12">
                <input type="hidden" name="affliate_id" value="{{@$qry->affliate_id}}">
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" name="subject" class="form-control" value="{{@$qry->subject}}">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Message</label>
                  <textarea id="summernote" type="text" rows=10 name="message" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Screenshot (Optional)</label>
                  <input type="file" name="screenshot" class="form-control">
                </div>
              </div>
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary ">Send</button>
                @if ($reply != '')
                <a class="btn btn-success" href="{{url('publisher/support')}}">Go Back</a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    @if($reply=='')

    <div class="card">
      <div class="col-lg-12">
        <div class="card-header">
          <h3>View Messages</h3>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-striped w-100" id="example">
            <thead>
              <th>Message Id</th>
              <th>Sender</th>
              <th>Subject</th>
              <th>Date</th>
              <th>Action</th>
            </thead>

            @foreach(DB::table('messages as m')->where('m.receiver', Auth::guard('publisher')->user()->email)->orderBy('m.id', 'desc')->get() as $q)
            <tr>
              <td>{{$q->id}}</td>
              <td>{{$q->sender}}</td>
              <td>{{$q->subject}}</td>
              <td>{{$q->created_at}}</td>
              <td><a href="{{url('publisher/view-message')}}/{{$q->id}}" class="btn btn-primary">View</a>
                <a href="{{url('publisher/support')}}/{{$q->id}}" class="btn btn-danger">Reply</a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
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
    $('#summernote').summernote({
      height: 200
    });
  })
</script>
@endsection('js')