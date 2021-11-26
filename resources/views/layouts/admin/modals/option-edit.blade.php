<div class="modal fade" id="editOption-{{ $option->id }}" tabindex="-1" role="dialog" aria-labelledby="editOptionLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="addOptionLabel">Editing an Option</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<form id="editOptionForm" role="form" method="POST" action="{{ route('admin.options.update', $option->id) }}">
			@method('PATCH')
			@csrf
			<div class="modal-body">
				<div class="form-row"><!-- option 1 -->
					<div class="form-label-group col-md-12 mb-1">
						<input type="text" id="option_desc" name="desc" class="form-control" placeholder="Option description" value="{{ $option->desc }}">
						<label for="option_desc">Option Description</label>
					</div>
				</div><!-- option 1 -->
				@if(count($option->prices) >= 1)
					<!-- prices -->
					<label for="option_id" class="col-form-label">Prices:</label>
					@foreach($option->prices as $price)
						<div class="form-row">
							<input id="price_id[{{ $price->id }}]" name="price_id[{{ $price->id }}]" type="hidden" value="{{ $price->id }}">
							<div class="form-label-group col-md-5 mb-1">
								<input type="text" id="price_desc[{{ $price->id }}]" name="price_desc[{{ $price->id }}]" class="form-control" placeholder="Price description" value="{{ $price->desc }}">
								<label for="desc">Price Description</label>
							</div>
							<div class="form-label-group col-md-5 mb-1">
								<input type="text" id="price_cost[{{ $price->id }}]" name="price_cost[{{ $price->id }}]" class="form-control" placeholder="Price cost" value="{{ $price->cost }}">
								<label for="cost">Price cost</label>
							</div>

						</div>
					@endforeach
					<!-- prices -->
				@endif
				<div class="form-row"><!-- category -->
					<input id="category_id" name="category_id" type="hidden" value="{{ $category->id }}">
					<label for="option_id" class="col-form-label">Move the Option to:</label>
					<select class="form-control" name="item_id" id="item_id">
							<option value="" @if($option->item_id == null) selected @endif>Category: {{ $category->name }}</option>
						@foreach($category->items as $item)
							<option value="{{ $item->id }}" @if($option->item_id == $item->id) selected @endif>Item: {{ $item->name }}</option>
						@endforeach
					</select>
				</div><!-- category -->
			</div	>
			<div class="modal-footer">
				<button type="submit" class="btn btn-lg btn-primary btn-block">
					{{ __('Submit') }}
				</button>
			</div>
		</form>
	</div>
</div>
</div>
