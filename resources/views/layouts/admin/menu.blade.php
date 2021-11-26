@extends('admin')

@section('title')
	Menu Management
@endsection

@section('content')

	<p>
		<small class="form-text text-muted">
			<i class="fal fa-info-circle fa-lg"></i> If you plan on making a lot of changes to the menu and it will take some time, consider disabling the menu temporarily while you make changes.
		</small>
	</p>
	<div class="row mb-4">
		<div class="ml-3 mr-2 pt-1">
			Display menu to public:
		</div>
		<form class="col" method="POST" action="{{ route('admin.preferences.update', $disabled->key) }}">
			@method('PATCH')
			@csrf
			<input type="hidden" name="key" value="{{ $disabled->key }}">
			<div class="custom-control custom-switch">
				<input type="checkbox" class="custom-control-input" name="value" id="value" {{ $disabled->value == 'on' ? 'checked' : '' }} onClick="this.form.submit()">
				<label class="custom-control-label" for="value"></label>
			</div>
		</form>
	</div>

	<div>
		Last Updated: {{ $updated }}
	</div>
	<p>
		<small class="form-text text-muted">
			<i class="fal fa-info-circle fa-lg"></i> Click on each Category heading to expand it, displaying more information about that category. Click Edit on a Category to make changes to that Category's Information, Options, and Pricing. Click Edit on an Item to edit it's Information, Options, or Pricing.
		</small>
	</p>
	<div class="accordion" id="accordion">
		@foreach($categories->sortBy('sort_order') as $cat)
			<div class="card" data-toggle="collapse" data-target="#collapse-{{ $cat->link }}" @if(count($categories) <= 1) style="border-bottom:1px solid rgba(0,0,0,.125)" @endif>
				<div class="card-header">
					{{ $cat->name }}
					<ul class="list-inline float-right mb-0">
						<li class="list-inline-item">
							<form method="POST" action="{{ route('admin.moveUp', $cat->id) }}">
								@method('PATCH')
								@csrf
								<input type="hidden" name="id" value="{{ $cat->id }}" />
								<button type="submit" name="submit" value="category" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-up"></i></button>
							</form>
						</li>
						<li class="list-inline-item">
							<form method="POST" action="{{ route('admin.moveDown', $cat->id) }}">
								@method('PATCH')
								@csrf
								<input type="hidden" name="id" value="{{ $cat->id }}" />
								<button type="submit" name="submit" value="category" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-down"></i></button>
							</form>
						</li>
						<li class="list-inline-item"><a href="{{ route('admin.categories.edit', $cat->id) }}" class="text-primary"><i class="fal fa-edit"></i> Edit</a></li>
						<li class="list-inline-item">
							<form method="POST" action="{{ route('admin.categories.destroy', $cat->id) }}">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-link text-danger p-0"><i class="fal fa-trash-alt"></i> Delete</button>
							</form>
						</li>
					</ul>
				</div>
				@if(count($cat->items) >= 1)
					<ul class="list-group list-group-flush collapse" id="collapse-{{ $cat->link }}" data-parent="#accordion">
						@if($cat->desc)
							<li class="list-group-item">{{ $cat->desc }}</li>
						@else
							<li class="list-group-item">No description set for this category.</li>
						@endif
						@if(count($cat->options) >= 1)
							<li class="list-group-item">
								@if($cat->desc_options) {{ $cat->desc_options }} @else No options description set for this category. @endif
								<h6 class="mt-2">Options available in this category:</h6>
								<ul class="list-unstyled">
									@foreach($cat->options as $option)
										<li>
											{{ $option->desc }}
											<ul class="list-inline float-right">
											@foreach($option->prices as $price)
												<li class="list-inline-item">@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }}</li>
											@endforeach
											</ul>
										</li>
									@endforeach
								</ul>
							</li>
						@else
							<li class="list-group-item">
								@if($cat->desc_options) {{ $cat->desc_options }} @else No options description set for this category. @endif
								<h6 class="mt-2">No options set for this category.</h6>
							</li>
						@endif
						<h6 class="ml-2 mt-2"><strong>{{ count($cat->items) }}</strong> items in this category:</h6>
						@foreach($cat->items->sortBy('sort_order') as $item)
							<li class="list-group-item">
								<a href="{{ route('admin.items.edit', $item->id) }}">
									{{ $item->name }} @if($item->spicy == 1)<i class="fas fa-fire" style="color: Tomato;" title="Spicy!"></i>@endif
								</a>
								<ul class="list-inline float-right mb-0">
									@if(count($item->prices) >= 1)
										@foreach($item->prices as $price)
											<li class="list-inline-item">@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }}</li>
										@endforeach
									@endif
									<li class="list-inline-item">
										<form method="POST" action="{{ route('admin.moveUp', $item->id) }}">
											@method('PATCH')
											@csrf
											<input type="hidden" name="id" value="{{ $item->id }}" />
											<button type="submit" name="submit" value="item" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-up"></i></button>
										</form>
									</li>
									<li class="list-inline-item">
										<form method="POST" action="{{ route('admin.moveDown', $item->id) }}">
											@method('PATCH')
											@csrf
											<input type="hidden" name="id" value="{{ $item->id }}" />
											<button type="submit" name="submit" value="item" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-down"></i></button>
										</form>
									</li>
									<li class="list-inline-item"><a href="{{ route('admin.items.edit', $item->id) }}" class="text-primary"><i class="fal fa-edit"></i> Edit</a></li>
									<li class="list-inline-item">
										<form method="POST" action="{{ route('admin.items.destroy', $item->id) }}">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-link text-danger p-0"><i class="fal fa-trash-alt"></i> Delete</button>
										</form>
									</li>
								</ul>
								<p class="card-text"><small class="text-muted">{{ $item->desc }}</small></p>
							</li>
						@endforeach
					</ul>
				@else
					<ul class="list-group list-group-flush collapse" id="collapse-{{ $cat->link }}" data-parent="#accordion">
						@if($cat->desc)
							<li class="list-group-item">{{ $cat->desc }}</li>
						@else
							<li class="list-group-item">No description set for this category.</li>
						@endif
						@if(count($cat->options) >= 1)
							<h6 class="ml-2 mt-2">Options available in this category:</h6>
							<li class="list-group-item">
								<ul class="list-unstyled">
									@foreach($cat->options as $option)
										<li>
											<ul class="list-inline">
												<li class="list-inline-item">{{ $option->desc }}</li>
												@foreach($option->prices as $price)
													<li class="list-inline-item">@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }}</li>
												@endforeach
											</ul>
										</li>
									@endforeach
								</ul>
							</li>
						@else
							<li class="list-group-item">
								@if($cat->desc_options) {{ $cat->desc_options }} @else No options description set for this category. @endif
								<h6 class="mt-2">No options set for this category.</h6>
							</li>
						@endif
						<li class="list-group-item">No items in this category. <a href="{{ route('admin.items.create') }}">Add an Item</a>.</li>
					</ul>
				@endif
			</div>
		@endforeach
		@if(count($categories) === 0)
			<div class="card" data-toggle="collapse" data-target="#collapseUncategorized">
				<div class="card-header">
					There are no categories. Please <a href="{{ route('admin.categories.create') }}">create a category</a> to begin.
				</div>
			</div>
		@endif
		@if(count($empty) >= 1)
			<div class="card" data-toggle="collapse" data-target="#collapseUncategorized">
				<div class="card-header">
					Uncategorized Items
				</div>
				<ul class="list-group list-group-flush collapse" id="collapseUncategorized" data-parent="#accordion">
					<li class="list-group-item">Items listed here had their categories deleted, but the items themselves were not deleted. These items <strong>are not listed</strong> on the customer-facing menu on the front page.</li>
					<h6 class="ml-2 mt-2"><strong>{{ count($empty) }}</strong> items in this category:</h6>
					@foreach($empty as $eitem)
						<li class="list-group-item">
							<a href="#">
								{{ $eitem->name }} @if($eitem->spicy == 1)<i class="fas fa-fire" style="color: Tomato;" title="Spicy!"></i>@endif
							</a>
							@foreach($eitem->prices as $price)
								(@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }})
							@endforeach
							<ul class="list-inline float-right mb-0">
								<li class="list-inline-item"><a href="{{ route('admin.items.edit', $eitem->id) }}" class="text-primary"><i class="fal fa-edit"></i> Edit</a></li>
								<li class="list-inline-item">
									<form method="POST" action="{{ route('admin.items.destroy', $eitem->id) }}">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-link text-danger p-0"><i class="fal fa-trash-alt"></i> Delete</button>
									</form>
								</li>
							</ul>
							<p class="card-text"><small class="text-muted">{{ $eitem->desc }}</small></p>
						</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>

@endsection
