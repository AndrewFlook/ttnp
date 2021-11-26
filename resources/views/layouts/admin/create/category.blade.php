@extends('admin')

@section('title')
	Create New Category
@endsection

@section('content')

	<form id="categoryForm" role="form" method="POST" action="{{ route('admin.categories.store') }}">
		@method('POST')
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Category Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="Category Name" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="desc" class="col-sm-2 col-form-label">Category Description</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="desc" name="desc" placeholder="Category Description">
			</div>
		</div>
		<div class="form-group row">
			<label for="desc_options" class="col-sm-2 col-form-label">Description of available options</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="desc_options" name="desc_options" placeholder="Description of available options">
			</div>
		</div>
		<small id="price_descHelp" class="form-text text-muted ml-2 mb-3">
			The <strong>Category Description</strong> should describe the category in it's entirety. What kind of food is in this category, and what is it served with?
			The <strong>Description of available options</strong> should describe the options available to all dishes within the category, such as "unless specified, served with your choice of..." and then the options for that category will be listed under this description. <strong>Do not add the options</strong> themselves to this description, you can add options to the category later.
		</small>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Add Category</button>
			</div>
		</div>
	</form>

@endsection
