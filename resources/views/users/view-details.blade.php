@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('users.index') }}" class="btn btn-danger">Back</a>
</div>
<div class="card">
	<div class="card-header">My Profile</div>

	<div class="card-body">
		
		@foreach( $user_list as $user )


			@if($user->name)
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
			</div>
			@endif


			@if($user->email)
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" disabled="disabled" class="form-control" name="email" id="email" value="{{ $user->email }}">
			</div>
			@endif


			@if($user->about)
			<div class="form-group">
				<label for="about">About Me</label>
				<textarea name="about" id="about" cols="5" rows="5" class="form-control">{{$user->about}}</textarea>
			</div>
			@endif

			@if($user->email)
			<div class="form-group">
				<label for="about">User Image</label><br/>
				<img width="90px" height="90px" src="{{ Gravatar::src($user->email) }}" />
			</div>
			@endif

			@if($user->country)
			<div class="form-group">
				<label for="country">Country</label>
				<select  id="country-dd" name="country" class="form-control">
					<option value="">{{$user->country}}</option>
				</select>
			</div>
			@endif

			@if($user->state)
			<div class="form-group">
				<label for="state">State</label>
				<select id="state-dd" name="state" class="form-control">
					<option value="">{{$user->state}}</option>
				</select>
			</div>
			@endif


			@if($user->city)
			<div class="form-group">
				<label for="city">City</label>
				<select id="city-dd" name="city" class="form-control">
					<option value="">{{$user->city}}</option>
				</select>
			</div>
			@endif

			@endforeach
	</div>
</div>
@endsection