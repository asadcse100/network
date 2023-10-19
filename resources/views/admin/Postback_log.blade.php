@extends('admin.admin_layouts.app')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-lg-12 ">
				<div class="card">
					<div class="card-header">
						<h4>Postback Log Sent</h4>
					</div>
					<div class="card-body">
						<form id="form1">
							@csrf
							<div class="row">
								<div class="col-xxl-1 col-xl-2 col-lg-2 col-md-3 col-sm-4 p-1">
									<!-- <label class="form-label">Search</label> -->
									<input type="" name="network_name" class="form-control" id="network_name" placeholder="Search">
								</div>
								<div class="col-xxl-1 col-xl-2 col-lg-2 col-md-3 col-sm-4 p-1">
									<!-- <label class="form-label">By</label> -->
									<select type="text" name="status" id="status" class="form-control">
										<option value="">Click Id</option>
										<option value="Inactive">Advertiser Id</option>
										<option value="Active">Affiliate Id</option>
									</select>
								</div>
								<div class="col-xxl-1 col-xl-2 col-lg-2 col-md-3 col-sm-4 p-1">
									<!-- <label class="form-label">From</label> -->
									<input type="date" name="from_date" class="form-control" id="from_date">
								</div> TO
								<div class="col-xxl-1 col-xl-2 col-lg-2 col-md-3 col-sm-4 p-1">
									<!-- <label class="form-label">To</label> -->
									<input type="date" name="to_date" class="form-control" id="to_date">
								</div>
								<div class="col-xxl-1 col-xl-2 col-lg-2 col-md-3 col-sm-4 p-1">
									<button type="button" class="btn btn-primary" id="search">Search</button>
								</div>
							</div>
						</form>
						<div class="row">
							<div class="col-lg-12 mt-3  table-responsive">
								<table id="datatable" class="table table-sm ">
									<thead>
										<tr>
											<td>ID</td>
											<td>DATE</td>
											<td>Publisher ID</td>
											<td>OFFER ID</td>
											<td>URL</td>
											<td>STATUS</td>
										</tr>
									</thead>

									<tbody id="showdata" class="text-dark">
										@foreach(DB::table('postback_sent')->orderBy('id', 'desc')->get() as $q)
										<tr>
											<td>{{$q->id}}</td>
											<td>{{$q->created_at}}</td>
											<td>{{$q->publisher_id}}</td>
											<td>{{$q->offer_id}}</td>
											<td>{{$q->url}}</td>
											<td>{{$q->status}}</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endsection('content')

			@section('js')
			<script type="text/javascript">
				$('.js-example-basic-multiple').select2();

				$(function() {
					$('#datatable').DataTable({
						'ordering': false,
						'lengthChange': false,
						'destroy': true,
					})
					showdata();

					function showdata() {
						$.ajax({
							method: 'get',
							url: '<?php echo url('admin/show-Postback') ?>',
							async: false,
							dataType: 'json',
							success: function(res) {

								let html = '';
								let sno = 0;
								for (var i = 0; i < res.length; i++) {
									sno++;
									let clicks = res[i].clicks == null ? 0 : res[i].clicks;
									let conversion = res[i].conversion == null ? 0 : res[i].conversion;
									let smartlink = res[i].smartlink == null || res[i].smartlink == 0 ? 'No' : 'Yes';
									let incentive_allowed = res[i].incentive_allowed == null || res[i].incentive_allowed == 0 ? 'No' : 'Yes';
									let magiclink = res[i].magiclink == null || res[i].magiclink == 0 ? 'No' : 'Yes';
									let native = res[i].native == null || res[i].native == 0 ? 'No' : 'Yes';
									let lockers = res[i].lockers == null || res[i].lockers == 0 ? 'No' : 'Yes';

									html += '<tr>' +
										'<td>' + res[i].Postbackid + '</td>' +
										'<td>' + res[i].Postback_name + '</td>' +
										'<td>' + res[i].category_name + '</td>' +
										'<td>' + res[i].countries + '</td>' +
										'<td>' + res[i].payout_type + '</td>' +
										'<td>' + res[i].payout + '</td>' +
										'<td>' + res[i].ua_target + '</td>' +
										'<td>' + res[i].status + '</td>' +
										'<td style="text-transform:uppercase">' + res[i].Postback_type + '</td>' +
										'<td>' + clicks + '</td>' +
										'<td>' + conversion + '</td>' +
										'<td>' + incentive_allowed + '</td>' +
										'<td>' + smartlink + '</td>' +
										'<td>' + magiclink + '</td>' +
										'<td>' + native + '</td>' +
										'<td>' + lockers + '</td>' +
										'<td>' + res[i].publisher_name + '</td>' +

										'<td><a href="{{url("admin/edit-Postback")}}/' + res[i].Postbackid + '" class="editData" data=' + res[i].id + '>Edit </a>&nbsp;<a  href="javascript:;" class="text-danger deleteData" data=' + res[i].id + '>Delete</a></td>' +
										'</tr>';
								}
								$('#datatable').DataTable().destroy();
								$('#showdata').html(html);
								$('#datatable').DataTable({
									ordering: false
								}).draw();
							},
							error: function() {}
						})
					}

					$('#search').click(function() {
						var data = $('#form1').serialize();
						console.log(data);
						$.ajax({
							method: 'get',
							data: data,
							url: '<?php echo url('admin/search-Postback') ?>',
							async: false,
							dataType: 'json',
							success: function(res) {

								let html = '';
								let sno = 0;
								for (var i = 0; i < res.length; i++) {
									sno++;
									let clicks = res[i].clicks == null ? 0 : res[i].clicks;
									let conversion = res[i].conversion == null ? 0 : res[i].conversion;
									let smartlink = res[i].smartlink == null || res[i].smartlink == 0 ? 'No' : 'Yes';
									let incentive_allowed = res[i].incentive_allowed == null || res[i].incentive_allowed == 0 ? 'No' : 'Yes';
									let magiclink = res[i].magiclink == null || res[i].magiclink == 0 ? 'No' : 'Yes';
									let native = res[i].native == null || res[i].native == 0 ? 'No' : 'Yes';
									let lockers = res[i].lockers == null || res[i].lockers == 0 ? 'No' : 'Yes';

									html += '<tr>' +
										'<td>' + res[i].Postbackid + '</td>' +
										'<td>' + res[i].Postback_name + '</td>' +
										'<td>' + res[i].category_name + '</td>' +
										'<td>' + res[i].countries + '</td>' +
										'<td>' + res[i].payout_type + '</td>' +
										'<td>' + res[i].payout + '</td>' +
										'<td>' + res[i].ua_target + '</td>' +
										'<td>' + res[i].status + '</td>' +
										'<td  style="text-transform:uppercase">' + res[i].Postback_type + '</td>' +
										'<td>' + clicks + '</td>' +
										'<td>' + conversion + '</td>' +
										'<td>' + incentive_allowed + '</td>' +
										'<td>' + smartlink + '</td>' +
										'<td>' + magiclink + '</td>' +
										'<td>' + native + '</td>' +
										'<td>' + lockers + '</td>' +
										'<td>' + res[i].publisher_name + '</td>' +
										'<td><a href="{{url('admin/edit-Postback')}}/' + res[i].Postbackid + '" class="editData" data=' + res[i].id + '>Edit </a>&nbsp;<a  href="javascript:;" class="text-danger deleteData" data=' + res[i].id + '>Delete</a></td>' +
										'</tr>';
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
					})
				})
			</script>
			@endsection('js')