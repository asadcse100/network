@extends('affliate.affliate_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-12 ">
				<div class="card">
					<div class="card-header">
						<h4>Settings </h4>
					</div>
					<div class="card-body">
						<form action="{{url('affliate/change-password')}}" method="post">
							@csrf
							<input type="hidden" name="id" value="{{Auth::guard('affliate')->id()}}">
							<div class="row">
								<div class="col-lg-12">
									<h5>Change Password</h5>
								</div>
								<div class="col-lg-3 col-md-4 col-sm-5 mb-2">
									<!-- <label class="form-label">New Password</label> -->
									<input class="form-control" type="" name="password" placeholder="New Password">
								</div>
								<div class="col-lg-3 col-md-4 col-sm-5 mb-2">
									<!-- <label class="form-label">Confirm Password</label> -->
									<input class="form-control" type="" name="confirm_password" placeholder="Confirm Password">
								</div>
								<div class="col-lg-3 col-md-4 col-sm-2 mb-2">
									<button class="btn btn-dark">Change</button>
								</div>
							</div>
						</form>
						<form action="{{url('affliate/update-settings')}}" method="post" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{Auth::guard('affliate')->id()}}">
							<div class="row mt-2">
								<div class="col-lg-12">
									<h5>Edit Personal Information</h5>
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Name</label>
									<input class="form-control" type="" value="{{$data->name}}" name="name">
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Email</label>
									<input class="form-control" type="" value="{{$data->email}}" name="email">
								</div>

								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Skype</label>
									<input class="form-control" type="" value="{{$data->skype}}" name="skype">
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Address</label>
									<input class="form-control" type="" value="{{$data->address}}" name="address">
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Payment Method</label>
									<select class="form-control" type="" value="{{$data->payment_method}}" name="payment_method">
										<option value="">Select Payment Method</option>
										<option value="Paypal" {{$data->payment_method=='Paypal'?'selected':''}}>Paypal</option>
										<option value="Bitcoin" {{$data->payment_method=='Bitcoin'?'selected':''}}>Bitcoin</option>
										<option value="Skrill" {{$data->payment_method=='Skrill'?'selected':''}}>Skrill</option>
										<option value="Payoneer" {{$data->payment_method=='Payoneer'?'selected':''}}>Payoneer"</option>
										<option value="Bank Wire" {{$data->payment_method=='Bank Wire'?'selected':''}}>Bank Wire"</option>
									</select>
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Payment Details</label>
									<textarea class="form-control" type="" value="" name="payment_description">{{$data->payment_description}}</textarea>
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<label class="form-label">Photo</label>
									<input class="form-control" type="file" name="photo" accept="image/gif, image/jpeg, image/png">
								</div>
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-2">
									<input type="hidden" name="hidden_img" value="{{ $data->photo }}"></input>
									<a href="{{asset('uploads')}}/{{$data->photo}}" target="_blank"><img src="{{asset('uploads')}}/{{$data->photo}}" width="100" height="100"></a>
								</div>
								<div class="col-xl-2 col-lg-3 col-md-3 col-sm-6">
									<button class="btn btn-success btn-block" style="margin-top: 33px">Save Changes</button>
								</div>
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
	@if(Session::has('success'))
	Swal.fire({
		title: '{{Session::get("success")}}',
		confirmButtonText: 'Ok'
	})
	@endif
</script>
@endsection('js')