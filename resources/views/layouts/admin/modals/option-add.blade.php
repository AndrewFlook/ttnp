<div class="modal fade" id="addOption" tabindex="-1" role="dialog" aria-labelledby="addOptionLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<form id="addOptionForm" role="form" method="POST" action="{{ route('admin.options.store') }}">
			@csrf
			<div class="modal-header">
				<h5 class="modal-title" id="addOptionLabel">Add an Option</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-row"><!-- option 1 -->
					<div class="form-label-group col-md-12 mb-1">
						<input type="text" id="option_desc" name="desc" class="form-control" placeholder="Option description">
						<label for="option_desc">Option Description</label>
					</div>
				</div><!-- option 1 -->
				<div class="form-row"><!-- category -->
					@if(Route::currentRouteNamed('admin.categories.edit'))
						<input id="category_id" name="category_id" type="hidden" value="{{ $category->id }}">
						<label for="option_id" class="col-form-label">Add Option to:</label>
						<select class="form-control" name="item_id" id="item_id">
								<option value="">Category: {{ $category->name }}</option>
							@foreach($category->items as $item)
								<option value="{{ $item->id }}">Item: {{ $item->name }}</option>
							@endforeach
						</select>
					@elseif(Route::currentRouteNamed('admin.items.edit'))
						<input name="item_id" type="hidden" value="{{ $item->id }}">
					@endif
				</div><!-- category -->
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
