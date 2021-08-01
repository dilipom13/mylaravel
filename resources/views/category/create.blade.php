@extends('layouts.app')

@section('content')

<div class="card card-default">
	<div class="card-header">
	{{ isset($category) ? 'Edit Categorie' : 'Create Categories' }}
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


		<form action="{{ isset($category) ? route('categories.update',$category->id)  : route('categories.store') }}" method="POST">
			@csrf
			@if(isset($category))
				@method('PUT')
			@endif
			
			<div class="form-group">
				<label for="name">Category Name</label>
				<input type="text" name="name" id="category_name" class="form-control" value="{{ isset($category) ? $category->name : ''}}">
			</div>
			<div class="form-group">
				<label for="name">Category Description</label>
				<textarea name="description" class="form-control" id="description" rows="10" cols="30">{{ isset($category) ? $category->description : '' }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">
				{{ isset($category) ? 'Update Category':'Add Category' }}
				</button>
			</div>
		</form>
	</div>
</div>

@endsection