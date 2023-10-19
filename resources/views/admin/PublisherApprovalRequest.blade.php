@extends('admin.admin_layouts.app')
@section('content')
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-lg-12 ">
				<div class="card">
					<div class="card-header">
						<h4>Publisher Approval Request</h4>
					</div>
					<div class="card-body">
						<form id="form1">
							@csrf
							<div class="row">
							</div>
						</form>
						<div class="row">
							<div class="col-lg-12 mt-3  table-responsive">
								<table id="datatable" class="table table-sm  ">
									<thead>
										<tr>
											<td>Id</td>
											<td>Email</td>
											<td>Status</td>
											<td>Balance</td>
											<td>Date Joined</td>
											<td>Email Verification</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody id="showdata" class="text-dark">
									</tbody>
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
								<h5 class="modal-title">Delete Approval Request</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								Do You want to delete this Approval Request.
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
				url: '<?php echo url('admin/show-publisher-approval') ?>',
				async: false,
				dataType: 'json',
				success: function(res) {
					let html = '';
					let sno = 0;
					for (var i = 0; i < res.length; i++) {
						sno++;
						let item = '';
						if (res[i].status == 'Approved') {
							item = '<a  href="javascript:;" class="text-danger rejectData" data=' + res[i].id + '>Reject</a>'
						} else if (res[i].status == 'Inactive') {
							item = '<a  href="<?php echo url('admin/publisher-approve-request') ?>/' + res[i].id + '" class="text-danger" data=' + res[i].id + '>Approve</a>'
						} else if (res[i].status == 'Rejected') {
							item = '<a  href="javascript:;" class="text-danger approveData" data=' + res[i].id + '>Approve</a>'
						}
						html += '<tr>' +
							'<td>' + res[i].id + '</td>' +
							'<td>' + res[i].email + '</td>' +
							'<td>' + res[i].status + '</td>' +
							'<td>' + parseFloat(res[i].balance).toFixed(3) + '</td>' +
							'<td>' + res[i].created_at + '</td>' +
							'<td>' + (res[i].verified == 1 ? 'Verifed' : 'Unverified') + '</td>' +
							'<td>' + item + '</td>' +
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
		//EDIT DATA
		$('#showdata').on('click', '.approveData', function() {
			let id = $(this).attr('data');
			var txt;
			var r = confirm("Do you want to Approve this Request!");
			if (r == true) {
				window.location.href = '<?php echo url('admin/publisher-approve-request') ?>/' + id + '';
			}
		})
		//EDIT DATA
		$('#showdata').on('click', '.rejectData', function() {
			let id = $(this).attr('data');
			var txt;
			var r = confirm("Do you want to Reject this Request!");
			if (r == true) {
				window.location.href = '<?php echo url('admin/website-reject-request') ?>/' + id + '';
			}
		})

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
							'<td>' + parseFloat(res[i].payout).toFixed(3) + '</td>' +
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
							'<td><a href="{{url("admin/edit-Postback")}}/' + res[i].Postbackid + '" class="editData" data=' + res[i].id + '>Edit </a>&nbsp;<a  href="javascript:;" class="text-danger deleteData" data=' + res[i].id + '>Delete</a></td>' +
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