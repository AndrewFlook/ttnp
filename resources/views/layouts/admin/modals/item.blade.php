<div class="modal fade" id="addItem" tabindex="-1" role="dialog" aria-labelledby="addItemLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="addItemForm" role="form" method="POST" action="{{ route('admin.items.store') }}">
				@csrf
				<input name="category_id" type="hidden" value="{{ $category->id }}">
				<div class="modal-header">
					<h5 class="modal-title" id="addOptionLabel">Add an Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-row"><!-- option 1 -->
						<div class="form-label-group col-md-12 mb-1">
							<input type="text" id="name" name="name" class="form-control" placeholder="Item name">
							<label for="name">Item Name</label>
						</div>
					</div><!-- option 1 -->
					<div class="form-row"><!-- option 1 -->
						<div class="form-label-group col-md-12 mb-1">
							<input type="text" id="desc" name="desc" class="form-control" placeholder="Item description">
							<label for="desc">Item Description</label>
						</div>
					</div><!-- option 1 -->
					<div class="form-group form-check m-2"><!-- spicy? -->
						<input type="checkbox" class="form-check-input" id="spicy" name="spicy">
						<label class="form-check-label" for="exampleCheck1">
							Is this dish Spicy?
						</label>
					</div><!-- spicy -->
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
