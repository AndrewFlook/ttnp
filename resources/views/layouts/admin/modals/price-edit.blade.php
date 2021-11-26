<div class="modal fade" id="editPrice-{{ $price->id }}" tabindex="-1" role="dialog" aria-labelledby="editPriceLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="editPriceForm" role="form" method="POST" action="{{ route('admin.prices.update', $price->id) }}">
				@method('PATCH')
				@csrf
				@if(Route::currentRouteNamed('admin.categories.edit'))
					<input name="category_id" type="hidden" value="{{ $category->id }}">
				@elseif(Route::currentRouteNamed('admin.items.edit'))
					<input name="item_id" type="hidden" value="{{ $item->id }}">
				@endif
				<div class="modal-header">
					<h5 class="modal-title">Editing a Price</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row">
						<div class="form-label-group col-md-6 mb-1">
							<input type="text" id="edit_desc" name="desc" class="form-control" placeholder="Price description" value="{{ $price->desc }}">
							<label for="desc">Price Description</label>
						</div>
						<div class="form-label-group col-md-6 mb-1">
							<input type="text" id="edit_cost" name="cost" class="form-control" placeholder="Price cost" value="{{ $price->cost }}">
							<label for="cost">Price cost</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="edit_submit" name="submit" class="btn btn-lg btn-primary btn-block">
						{{ __('Submit') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
