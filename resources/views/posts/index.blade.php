@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('posts.create') }}" class="btn btn-success">Add Post</a>
</div>

<div class="card card-default">
	<div class="card-header">
		Posts
	</div>

	<div class="card-body">
		@if($posts_record->count() > 0)
		
			<table class="table">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Category</th>
				<th><!-- Edit --></th>
				<th>
					<!-- Delete -->
				</th>
			</thead>
			<tbody>
					@foreach( $posts_record as $post )

						<tr>
							<td>
							<img src="{{ Storage::url($post->image) }}" width="140px" height="120px" alt="">
							</td>
							<td>{{ $post->title }}</td>
							<td><a href="{{ route('categories.edit', $post->category->id) }}">
								{{ $post->category->name }}
								</a>
							</td>
							@if($post->trashed())
							<td>
							<form action="{{ route('restore-posts', $post->id) }}" method="POST">
								@csrf
								@method('PUT')
						<button type="submit" class="btn btn-info" style="color: #ffffff;">Restore</button>
							</form>
							</td>
							@else
							<td>
								<a href="{{ route('posts.edit',$post->id) }}" class="btn btn-info" style="color: #ffffff;">Edit</a>
							</td>
							@endif		
							<td>
						<form action="{{ route('posts.destroy',$post->id) }}" method="POST">
						@csrf
						@method('DELETE')
							<button type="submit" class="btn btn-danger">
								{{ $post->trashed() ? 'Delete' :'Trash' }}
							</button>	
						</form>
								
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<h3 class="text-center">No Posts Yet</h3>
		@endif
	</div>
</div>
@endsection