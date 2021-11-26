<div class="modal fade" id="addPrice" tabindex="-1" role="dialog" aria-labelledby="addPriceLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<form id="addPriceForm" role="form" method="POST" action="{{ route('admin.prices.store') }}">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title">Add a Price</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row">
					<div class="form-label-group col-md-6 mb-1">
						<input type="text" id="price_desc" name="desc" class="form-control" placeholder="Price description">
						<label for="price_desc">Price Description</label>
					</div>
					<div class="form-label-group col-md-6 mb-1">
						<input type="text" id="price_cost" name="cost" class="form-control" placeholder="Price cost">
						<label for="price_cost">Price cost</label>
					</div>
				</div>
				<div class="form-row"><!-- category -->
					<label for="option_id" class="col-form-label">Add Price to:</label>
					@if(Route::currentRouteNamed('admin.categories.edit'))
						<input name="category_id" type="hidden" value="{{ $category->id }}">
						<select class="form-control" id="option_id" name="option_id" >
							<option value="">Category: {{ $category->name }}</option>
							@foreach($category->options as $option)
								<option value="{{ $option->id }}">Option: {{ $option->desc }}</option>
							@endforeach
						</select>
					@elseif(Route::currentRouteNamed('admin.items.edit'))
						<input name="item_id" type="hidden" value="{{ $item->id }}">
						<select class="form-control" id="option_id" name="option_id">
							<option value="">Item: {{ $item->name }}</option>
							@foreach($item->options as $option)
								<option value="{{ $option->id }}">Option: {{ $option->desc }}</option>
							@endforeach
						</select>
					@endif
				</div><!-- category -->
				<small class="form-text text-muted mt-3">
					<i class="fal fa-info-circle fa-lg"></i> Prices can only be added to the Item or Item Options on this page. To add a price to the Category or Category Options, go to the Category's Edit page, and add the Price on that page to the Category or Category Option.
				</small>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-lg btn-primary btn-block">
					{{ __('Submit') }}
				</button>
			</div>
		</form>
	</div>
</div>
</div>
