@extends('affliate.affliate_layouts.app')
@section('content')

<div class="page-content-wrapper">
  <div class="page-content">
    <div class="row">
      <div class="col-lg-12 ">
        <div class="card">
          <div class="card-header">
            <h4>Rejected Offer Process</h4>
          </div>
          <div class="card-body">
            <form id="form1">
              @csrf
              <div class="row">
                <div class="col-lg-3">
                  <label>Offer Name</label>
                  <input class="form-control" placeholder="Offer Name" name="offer_name">
                </div>
                <div class="col-lg-3">
                  <label>Offer Id</label>
                  <input class="form-control" placeholder="Offer Id" name="offer_id">
                </div>
                <div class="col-lg-3">
                  <label>Ip Address</label>
                  <input class="form-control" placeholder="Ip Address" name="ip_address">
                </div>
                <div class="col-lg-3">
                  <label>Publisher Name</label>
                  <input class="form-control" placeholder="Publisher Name" name="publisher_email">
                </div>
                <div class="col-lg-3">
                  <label>Publisher Email</label>
                  <input class="form-control" placeholder="Publisher Email" name="publisher_email">
                </div>
                <div class="col-lg-3">
                  <label>Hash</label>
                  <input class="form-control" placeholder="Hash" name="hash">
                </div>
                <div class="col-lg-3">
                  <label>Advertiser Name</label>
                  <input class="form-control" placeholder="Advertiser Name" name="advertiser_name">
                </div>
                <div class="col-lg-3">
                  <label class="form-label">Countries</label>
                  <select class="js-example-basic-multiple" name="countries[]" multiple="multiple" style="width: 100%">
                    <option></option>
                    @foreach (DB::table('countries')->get() as $q)
                    <option value="{{$q->country_name}}">{{$q->country_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-3">
                  <label class="form-label">Targeting</label>
                  <select class="selectpicker w-100" name="ua_target[]" id="ua_target" multiple data-actions-box="true">
                    <option value="Windows">Windows</option>
                    <option value="Android">Android</option>
                    <option value="Iphone">Iphone</option>
                    <option value="Ipad">Ipad</option>
                    <option value="Mac">Mac</option>
                  </select>
                </div>
                <div class="col-lg-3">
                  <label class="form-label">Browsers</label>
                  <select class="selectpicker w-100" name="browser[]" multiple data-actions-box="true" required="">
                    @if (isset($data[0]))
                    @php $ua = explode('|', $data[0]->browsers); @endphp
                    @endif
                    <option value="Firefox">Firefox</option>
                    <option value="Chrome">Chrome</option>
                    <option value="Safari">Safari</option>
                    <option value="EDGE">EDGE</option>
                    <option value="Internet Explorer">Internet Explorer</option>
                    <option value="OPERA MINI">OPERA MINI</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="col-lg-3">
                  <button class="btn btn-primary filter " id="search" type="button" style="margin-top: 31px;">Filter</button>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-lg-12 mt-3  table-responsive">
                <table id="example2" class="table table-sm  ">
                  <thead>
                    <tr>
                      <td></td>
                      <td>Action</td>
                      <td>Advertiser Offer Id</td>
                      <td>Offer Name</td>
                      <td>Ip Address</td>
                      <td>Ip Score</td>
                      <td>Date</td>
                      <td>Publisher ID</td>
                      <td>Publisher Name</td>
                      <td>Publisher Email</td>
                      <td>Payout</td>
                      <td>Advertiser Name</td>
                      <td>Hash Key</td>
                      <td>Country</td>
                      <td>Browser</td>
                      <td>UA Target</td>
                      <td>Unique</td>
                      <td>Status</td>
                    </tr>
                  </thead>
                  <form id="form">
                    @csrf
                    <tbody id="showdata" class="text-dark">
                      <?php
                      $qry = DB::table('offer_process as o')->select('o.offer_name', 'o.id', 'o.advertiser_offer_id', 'o.ip_address', 'o.created_at', 'o.publisher_id', 'p.name as publisher_name', 'p.email as publisher_email', 'o.payout', 'a.advertiser_name', 'o.code', 'o.country', 'o.browser', 'o.ua_target', 'o.unique_', 'o.status')->join('publishers as p', 'p.id', '=', 'o.publisher_id')->join('offers as of', 'of.id', '=', 'o.offer_id')->join('advertisers as a', 'a.id', '=', 'o.advertiser_id')->where('o.status', 'Rejected')->join('affliates as aff', 'aff.id', '=', 'p.affliate_manager_id')->where('aff.power_mode', '1')->where('p.affliate_manager_id', Auth::guard('affliate')->id())->where('o.key_', null)->get();
                      ?>
                      @foreach($qry as $q)
                      <tr>
                        <td><input type="checkbox" name="check[]" value="{{$q->id}}"></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item approveSelected" type="button">Approve Selected</a>
                              <a class="dropdown-item waitingSelected" type="button">Mark Waiting Selected</a>
                              <a class="dropdown-item approveAll" type="button">Approve All</a>
                              <a class="dropdown-item waitAll" type="button">Wait All</a>
                            </div>
                          </div>
                        </td>
                        <td>{{$q->advertiser_offer_id}}</td>
                        <td>{{$q->offer_name}}</td>
                        <td>{{$q->ip_address}}</td>
                        <td></td>
                        <td>{{$q->created_at}}</td>
                        <td>{{$q->publisher_id}}</td>
                        <td>{{$q->publisher_name}}</td>
                        <td>{{$q->publisher_email}}</td>
                        <td>{{round($q->payout,2)}}</td>
                        <td>{{$q->advertiser_name}}</td>
                        <td>{{$q->code}}</td>
                        <td>{{$q->country}}</td>
                        <td>{{$q->browser}}</td>
                        <td>{{$q->ua_target}}</td>
                        <td>{{$q->unique_}}</td>
                        <td>{{$q->status}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </form>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Delete MODAL -->
        <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Delete Pending Offer Process</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Do You want to delete this Pending Offer Process.
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="btnDelete">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- End Delete MODAL -->
      </div>
    </div>
  </div>
</div>

@endsection('content')

@section('js')
<script type="text/javascript">
  $(function() {
    $('.js-example-basic-multiple').select2();
    $('#datatable').DataTable({
      'ordering': false,
      'lengthChange': false,
      'destroy': true,
    })

    //EDIT DATA
    $('#showdata').on('click', '.approveSelected', function() {
      var data = $('#form').serialize();
      console.log(data);
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });

      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-pending-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Approved successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })
    $('#showdata').on('click', '.rejectSelected', function() {
      var data = $('#form').serialize();
      console.log(data);
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });
      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-reject-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Reject successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })

    $('#showdata').on('click', '.waitingSelected', function() {
      var data = $('#form').serialize();
      console.log(data);
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });

      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-wait-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Wait successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })
    $('#showdata').on('click', '.waitAll', function() {
      var data = $('#form').serialize();
      $("input:checkbox").attr('checked', 'true');
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });
      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-wait-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Awaited successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })

    $('#showdata').on('click', '.approveAll', function() {
      var data = $('#form').serialize();
      $("input:checkbox").attr('checked', 'true');
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });
      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-pending-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Approved successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })

    $('#showdata').on('click', '.rejectAll', function() {
      var data = $('#form').serialize();
      $("input:checkbox").attr('checked', 'true');
      var searchIDs = $('input:checked').map(function() {
        return $(this).val();
      });

      $.ajax({
        method: 'get',
        data: {
          check: searchIDs.get()
        },
        url: '<?php echo url('affliate/approve-reject-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          alert('Offer Process Rejected successfully');
          searchData();
        },
        error: function() {
          alert('Error');
        }
      })
    })

    $('#search').click(function() {
      searchData();
    })

    function searchData() {
      var data = $('#form1').serialize();
      $.ajax({
        method: 'get',
        data: data,
        url: '<?php echo url('affliate/search-reject-offer-process') ?>',
        async: false,
        dataType: 'json',
        success: function(res) {
          let html = '';
          let sno = 0;
          for (var i = 0; i < res.length; i++) {
            sno++;
            var payout = 0;
            if (res[i].payout != null || res[i].payout != '') {
              payout = parseFloat(res[i].payout).toFixed(2);
            }
            html += '<tr>' +
              '<td><input type="checkbox" name="check[]" value="' + res[i].id + '"></td>' +
              '<td>    <div class="btn-group" >' +
              '<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>' +
              '<div class="dropdown-menu">' +
              '<a class="dropdown-item approveSelected" type="button">Approve Selected</a><a class="dropdown-item waitingSelected" type="button">Mark Waiting Selected</a><a class="dropdown-item approveAll"   type="button">Approve All</a><a class="dropdown-item waitAll"  type="button">Wait All</a>' +
              '</div></div></td>' +
              '<td>' + res[i].advertiser_offer_id + '</td>' +
              '<td>' + res[i].offer_name + '</td>' +
              '<td>' + res[i].ip_address + '</td>' +
              '<td></td>' +
              '<td>' + res[i].created_at + '</td>' +
              '<td>' + res[i].publisher_id + '</td>' +
              '<td>' + res[i].publisher_name + '</td>' +
              '<td>' + res[i].publisher_email + '</td>' +
              '<td>' + payout + '</td>' +
              '<td>' + res[i].advertiser_name + '</td>' +
              '<td>' + res[i].code + '</td>' +
              '<td>' + res[i].country + '</td>' +
              '<td>' + res[i].browser + '</td>' +
              '<td>' + res[i].ua_target + '</td>' +
              '<td>' + res[i].unique_ + '</td>' +
              '<td>' + res[i].status + '</td>' +
              +'</tr>';
          }
          $('#datatable').DataTable().destroy();
          $('#showdata').html(html);
          $('#datatable').DataTable({
            ordering: false
          }).draw();
        },
        error: function() {
          alert('Error')
        }
      })
    }
  })
</script>
@endsection('js')