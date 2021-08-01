@extends('layouts.app')

@section('content')


<div class="card card-default">
	<div class="card-header">
		Users
	</div>

	<div class="card-body">
		@if($users->count() > 0)
		
			<table class="table">
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Email</th>
				<th>View</th>
				<th><!-- Edit --></th>
				<th>
					<!-- Delete -->
				</th>
			</thead>
			<tbody>
					@foreach( $users as $user )

						<tr>
							<td>
		<img width="60px" height="60px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}" />
							</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
				<td><a class="btn btn-danger" href="user-details/{{$user->id}}">View More Detail</a></td>
							<td>
							@if(!$user->isAdmin())
							<form action="{{ route('users.make-admin',$user->id) }}" method="post">
								@csrf
								<button type="submit" class="btn btn-success">Make Admin</button>
							</form>
							@endif
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<h3 class="text-center">No Users Yet</h3>
		@endif
	</div>
</div>
@endsection