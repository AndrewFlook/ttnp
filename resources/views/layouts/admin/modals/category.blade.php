<div class="modal fade" id="addCat" tabindex="-1" role="dialog" aria-labelledby="addCatLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form id="addCatForm" role="form" method="POST" action="{{ route('admin.menu.cat.post') }}">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add a Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-label-group">
						<input type="text" id="name" name="name" class="form-control" placeholder="Category name" required autofocus>
						<label for="name">Category name</label>
					</div>
					<div class="form-label-group">
						<input type="text" id="desc" name="desc" class="form-control" placeholder="Category description">
						<label for="desc">Category Description</label>
					</div>
					<div class="form-row">
						<div class="form-label-group col-md-12 mb-0">
							<input type="text" id="desc_options" name="desc_options" class="form-control" placeholder="Category options">
							<label for="desc_options">Description of available options</label>
						</div>
						<small id="price_descHelp" class="form-text text-muted ml-2 mb-3">
							The above description should be something along the lines of "served with steamed white rice" or "unless specified, served with...," etc.
						</small>
					</div>
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
