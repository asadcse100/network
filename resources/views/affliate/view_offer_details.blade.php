@extends('affliate.affliate_layouts.app')
@section('content')

<!--page-content-wrapper-->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-12 ">
				<div class="card">
					<div class="card-header">
						<h4>View Offer Details </h4>
					</div>
					<div class="card-body">
						<form action="{{ route('affliate.offer') }}" method="get">
							<div class="row">
								<div class="col-lg-12">
									@if(Session::has('danger'))
									<div class="alert alert-danger">
										{{ Session::get("danger") }}
									</div>
									@endif
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
									<!-- <label class="form-label">Offer ID</label> -->
									<input class="form-control" type="text" name="offer_id" placeholder="Offer ID">
								</div>
								<div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-12 p-1">
									<button class="btn btn-info">Search</button>
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