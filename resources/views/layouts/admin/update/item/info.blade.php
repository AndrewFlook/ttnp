<h5 class="card-header">
	Item Information
	<form class="float-right" method="POST" action="{{ route('admin.items.destroy', $item->id) }}">
		@method('DELETE')
		@csrf
		<button type="submit" class="btn btn-link text-danger p-0"><i class="fal fa-trash-alt"></i> Delete</button>
	</form>
</h5>
<div class="card-body">
	<form id="itemForm" role="form" method="POST" action="{{ route('admin.items.update', $item->id) }}">
		@method('PATCH')
		@csrf
		<div class="form-group row"><!-- category -->
			@if(!empty($item->category_id))
				<label for="category_id" class="col-sm-2 col-form-label">Category</label>
			@else
				<label for="category_id" class="col-sm-2 col-form-label">New Category</label>
			@endif
			<select class="form-control col-sm-10" id="category_id" name="category_id">
				@foreach($categories as $cat)
					<option value="{{ $cat->id }}" @if($item->category_id == $cat->id) ? selected : '' @endif>{{ $cat->name }}</option>
				@endforeach
			</select>
		</div><!-- category -->
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Item Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="Item Name" value="{{ $item->name }}" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="desc" class="col-sm-2 col-form-label">Item Description</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="desc" name="desc" value="{{ $item->desc }}" placeholder="Item Description">
			</div>
		</div>
		<div class="form-group form-check"><!-- spicy? -->
			<input type="checkbox" class="form-check-input" id="spicy" name="spicy" @if($item->spicy == 1) ? checked : '' @endif>
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
				<button type="submit" class="btn btn-primary">Update Item</button>
			</div>
		</div>
	</form>
</div>
