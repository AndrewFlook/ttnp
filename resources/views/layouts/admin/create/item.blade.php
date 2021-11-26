@extends('admin')

@section('title')
	Create New Item
@endsection

@section('content')

	<form id="itemForm" role="form" method="POST" action="{{ route('admin.items.store') }}">
		@method('POST')
		@csrf
		<div class="form-group row"><!-- category -->
			<label for="category_id" class="col-sm-2 col-form-label">Select a Category</label>
			<select class="form-control col-sm-10" id="category_id" name="category_id">
				@foreach($categories as $cat)
					<option value="{{ $cat->id }}">{{ $cat->name }}</option>
				@endforeach
			</select>
		</div><!-- category -->
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Item Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="Item Name" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="desc" class="col-sm-2 col-form-label">Item Description</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="desc" name="desc" placeholder="Item Description">
			</div>
		</div>
		<div class="form-group form-check"><!-- spicy? -->
			<input type="checkbox" class="form-check-input" id="spicy" name="spicy">
			<label class="form-check-label" for="exampleCheck1">
				Is this dish Spicy?
			</label>
		</div><!-- spicy -->
		<small id="price_descHelp" class="form-text text-muted ml-2 mb-3">
			The <strong>Select a Menu Category</strong> is required, and lists all available categories for an item to be added to. If the category you want does not show up in this list, you will need to create the category first. Items must have a category. Uncategorized items will not be shown on the menu.
			The <strong>Item Description</strong> should describe the item in it's entirety. What is served in this dish? What are the ingredients and how is it prepared?
			The <strong>Is this dish Spicy?</strong> checkbox will enable a small red flame icon next to the name of the dish so customers will know that this dish is spicy.
		</small>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Add Item</button>
			</div>
		</div>
	</form>

@endsection
