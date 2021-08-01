@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
	{{ isset($tag) ? 'Edit Tag' : 'Create Tags' }}
</div>
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


	<form action="{{ isset($tag) ? route('tags.update',$tag->id)  : route('tags.store') }}" method="POST">
			@csrf
			@if(isset($tag))
				@method('PUT')
			@endif
			
			<div class="form-group">
				<label for="name">Tag Name</label>
				<input type="text" name="name" id="tag_name" class="form-control" value="{{ isset($tag) ? $tag->name : ''}}">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">
				{{ isset($tag) ? 'Update Tag':'Add Tag' }}
				</button>
			</div>
		</form>
	</div>
</div>

@endsection