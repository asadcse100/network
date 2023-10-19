@extends('admin.admin_layouts.app')

@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="modal-header">
            <h5 class="modal-title">Privacy Policy</h5>
        </div>
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0">
                <div class="widget-content widget-content-area blog-create-section">
                    <form id="add_form" class="form-horizontal needs-validation" action="{{ route('privacy_policy.store') }}" method="POST" novalidate onsubmit="return validateform()" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="row layout-spacing">
                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-xxl-0">
                                <div class="widget-content widget-content-area blog-create-section">

                                    <div class="row layout-top-spacing p-3">
                                        <div class="col-sm-10">
                                            <div class="mb-2 required">
                                                <span>Description</span>
                                                <textarea name="description" id="description" class="form-control" required="">{!! DB::table('system_configurations')->where('type', 'privacy_policy_description')->first()->value !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group mb-2 required">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meta Title</span>
                                                <input type="text" class="form-control" name="meta_title" value="{!! DB::table('system_configurations')->where('type', 'privacy_policy_meta_title')->first()->value !!}">
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <div class="mb-2 required">
                                                <span>Meta Description</span>
                                                <textarea class="form-control" name="meta_description" id="meta_description" rows="40" cols="50">{!! DB::table('system_configurations')->where('type', 'privacy_policy_meta_description')->first()->value !!}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group mb-2 required">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meta Keywords</span>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{!! DB::table('system_configurations')->where('type', 'privacy_policy_meta_keywords')->first()->value !!}">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group mb-2 required">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Meta Image</span>
                                                <input class="form-control file-upload-input" type="file" name="meta_img" id="meta_img" value="{!! DB::table('system_configurations')->where('type', 'privacy_policy_meta_image')->first()->value !!}">
                                            </div>
                                        </div>
                                        
                                    <div class="col-md-10 p-2" style="text-align:right;">
                                        <button type="submit" class="btn btn-outline-success mb-2">Update</button>
                                    </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">
	$(function() {
		$('#description').summernote({
			height: 350
		});
		$('#meta_description').summernote({
			height: 200
		});
		$('.js-example-basic-multiple').select2();
		@if(Session::has('success'))
		Swal.fire({
			title: '{{Session::get("success")}}',
			confirmButtonText: 'Ok'
		})
		@endif
		$('#payout').change(function() {
			if ($('#payout').val() == 'fixed') {
				$('#payout_amount').removeAttr('disabled', 'true');
				$('#payout_amount').val('');
			} else {
				$('#payout_amount').attr('disabled', 'true');
			}
		})
		$('select[name=offer_type]').change(function(e) {
			if ($('select[name=offer_type]').val() == 'special') {
				$('.divhide').removeClass('d-none');
			} else {
				$('.divhide').addClass('d-none');
			}
		})
	})
</script>
@endsection