@extends('layouts.app')

@section('content')
<div class="card">
	<div class="card-header">My Profile</div>

	<div class="card-body">
		
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="md-2 my-2">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>	
		</div>
		@endif

		<form action="{{ route('users.update-profile') }}" method="POST">
			@csrf
			@method('PUT')

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
			</div>

			<div class="form-group">
				<label for="about">About Me</label>
				<textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
			</div>

			<div class="form-group">
				<label for="country">Country</label>
				<select  id="country-dd" name="country" class="form-control">
					<option value="">Select Country</option>
					@foreach ($countries as $data)
					<option value="{{$data->id}}">
						{{$data->name}}
					</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="state">State</label>
				<select id="state-dd" name="state" class="form-control">
				</select>
			</div>


			<div class="form-group">
				<label for="city">City</label>
				<select id="city-dd" name="city" class="form-control">
				</select>
			</div>

			<!-- <div class="form-group">
				{{ isset($user) ? $user->country  : 'Select Country' }}
				<label for="gender">Gender</label>
				<select name="gender" id="gender" class="form-control">
					<option value="">---Select---</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div> -->

			<button type="submit" class="btn btn-success">Update Profile</button>

		</form>
	</div>
</div>
@endsection

@section('scripts')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
	$(document).ready(function () {
		$('#country-dd').on('change', function () {
			var idCountry = this.value;
			$("#state-dd").html('');
			$.ajax({
				url: "{{url('api/fetch-states')}}",
				type: "POST",
				data: {
					country_id: idCountry,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (result) {
					$('#state-dd').html('<option value="">Select State</option>');
					$.each(result.states, function (key, value) {
						$("#state-dd").append('<option value="' + value
							.id + '">' + value.name + '</option>');
					});
					$('#city-dd').html('<option value="">Select City</option>');
				}
			});
		});
		$('#state-dd').on('change', function () {
			var idState = this.value;
			$("#city-dd").html('');
			$.ajax({
				url: "{{url('api/fetch-cities')}}",
				type: "POST",
				data: {
					state_id: idState,
					_token: '{{csrf_token()}}'
				},
				dataType: 'json',
				success: function (res) {
					$('#city-dd').html('<option value="">Select City</option>');
					$.each(res.cities, function (key, value) {
						$("#city-dd").append('<option value="' + value
							.id + '">' + value.name + '</option>');
					});
				}
			});
		});
	});

</script>
@endsection
