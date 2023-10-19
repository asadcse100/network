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
								<h4>Manage Site Category</h4>
							</div>
							<div class="col-lg-6 col-sm-6">
								<div class="text-right">
									<button class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal">Add Site Categories</button>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body">
						<div class="col-lg-12 table-responsive ">
							<table id="datatable" class="table table">
								<thead class="thead ">
									<tr>
										<th>Sno</th>
										<th>Site Categories</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="showdata">

								</tbody>
							</table>

							<!-- ADD MODAL -->
							<div id="addModal" class="modal fade" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Add Site Categories</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form id="form1">
												@csrf
												<label>Categories Name</label>

												<input type="text" name="Categories_name" class="form-control">
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" id="btnSave">Save</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End ADD MODAL -->

							<!-- Edit MODAL -->
							<div id="editModal" class="modal fade" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Edit Site Categories</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<form id="form2">
												@csrf
												<label>Categories Name</label>
												<input type="hidden" name="id" id="id">
												<input type="text" name="Categories_name1" class="form-control">
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" id="btnUpdate">Update</button>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End Edit MODAL -->

							<!-- Delete MODAL -->
							<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Delete Site Categories</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											Do You want to delete this Categories.
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
		</div>
		@endsection('content')
		<!-- ADD Categories Modal -->

		@section('js')
		<script type="text/javascript">
			$(function() {
				showdata();

				function showdata() {
					$.ajax({
						method: 'get',
						url: '<?php echo url('admin/show-site-categories') ?>',
						async: false,
						dataType: 'json',
						success: function(res) {
							let html = '';
							let sno = 0;
							for (var i = 0; i < res.length; i++) {
								sno++;
								html += '<tr>' +
									'<td>' + sno + '</td>' +
									'<td>' + res[i].site_category_name + '</td>' +
									'<td><a href="javascript:;" class="editData" data=' + res[i].id + '>Edit </a>&nbsp;<a  href="javascript:;" class="text-danger deleteData" data=' + res[i].id + '>Delete</a></td>' +
									'</tr>';
							}
							$('#datatable').DataTable().destroy();
							$('#showdata').html(html);
							$('#datatable').DataTable().draw();
						},
						error: function() {
							alert('Error')
						}
					})
				}

				//EDIT DATA
				$('#showdata').on('click', '.editData', function() {
					$('#editModal').modal('show');
					let id = $(this).attr('data');
					$.ajax({
						method: 'get',
						data: {
							id: id
						},
						url: '<?php echo url('admin/edit-site-categories') ?>',
						async: false,
						dataType: 'json',
						success: function(res) {
							$('input[name=Categories_name1]').val(res.site_category_name);
							$('#id').val(res.id);

						},
					})
				})

				//EDIT DATA
				$('#showdata').on('click', '.deleteData', function() {
					$('#deleteModal').modal('show');
					let id = $(this).attr('data');
					$('#btnDelete').unbind().click(function() {
						$.ajax({
							method: 'get',
							data: {
								id: id
							},
							url: '<?php echo url('admin/delete-site-categories') ?>',
							async: false,
							dataType: 'json',
							success: function(res) {
								$('#deleteModal').modal('hide');
								showdata();
							},
						});
					})
				})

				// Update DATA
				$('#btnUpdate').unbind().click(function() {
					let data = $('#form2').serialize();
					$.ajax({
						method: 'post',
						data: data,
						url: '<?php echo url('admin/update-site-categories') ?>',
						async: false,
						dataType: 'json',
						success: function(res) {
							$('#form2')[0].reset();
							$('#editModal').modal('hide');
							showdata();
						},
						error: function() {
							alert('Error')
						}
					})
				})

				//ADD DATA
				$('#btnSave').unbind().click(function() {
					let data = $('#form1').serialize();
					let result = '';
					if ($('input[name=Categories_name]').val() == '') {
						$('input[name=Categories_name]').addClass('is-invalid');
					} else {
						$('input[name=Categories_name]').removeClass('is-invalid');
						result += '1';
					}
					if (result == '1') {
						$.ajax({
							method: 'post',
							data: data,
							url: '<?php echo url('admin/insert-site-categories') ?>',
							async: false,
							dataType: 'json',
							success: function(res) {
								$('#form1')[0].reset();
								$('#addModal').modal('hide');
								showdata();
							},
							error: function() {
								alert('Error')
							}
						})
					}
				})
			});
		</script>
		@endsection