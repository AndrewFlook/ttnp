<h5 class="card-header" style="border-top:1px solid rgba(0,0,0,.125)">
	Options
	<small class="text-muted ml-2">
		@if(count($category->options) == 0)
			There are currently <strong>NO options</strong> in this category.
		@elseif(count($category->options) == 1)
			<strong>1 option</strong> in this category:
		@elseif(count($category->options) >= 2)
			<strong>{{ count($category->options) }} options</strong> in this category:
		@endif
	</small>
	<small class="float-right">
		<ul class="list-inline mb-0 py-1">
			<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#addOption">Add Option</a></li>
			<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#addPrice">Add Price</a></li>
		</ul>
	</small>
</h5>
<ul class="list-group list-group-flush">
	@foreach($category->options->sortBy('sort_order') as $option)
		@include('layouts.admin.modals.option-edit')
		<li class="list-group-item">
			{{ $option->desc }}
			<ul class="list-inline float-right mb-0">
				@if(count($option->prices) >= 1)
					@foreach($option->prices as $price)
						<li class="list-inline-item">
							@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }}
						</li>
					@endforeach
				@endif
				<li class="list-inline-item">
					<form method="POST" action="{{ route('admin.moveUp', $option->id) }}">
						@method('PATCH')
						@csrf
						<input type="hidden" name="id" value="{{ $option->id }}" />
						<button type="submit" name="submit" value="option" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-up"></i></button>
					</form>
				</li>
				<li class="list-inline-item">
					<form method="POST" action="{{ route('admin.moveDown', $option->id) }}">
						@method('PATCH')
						@csrf
						<input type="hidden" name="id" value="{{ $option->id }}" />
						<button type="submit" name="submit" value="option" class="btn btn-link text-info p-0"><i class="fal fa-arrow-alt-down"></i></button>
					</form>
				</li>
				<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#editOption-{{ $option->id }}"><i class="fal fa-edit"></i> Edit</a></li>
				<li class="list-inline-item">
					<form method="POST" action="{{ route('admin.options.destroy', $option->id) }}">
						@method('DELETE')
						@csrf
						@if(Route::currentRouteName('admin.categories.edit'))
							<input name="category_id" type="hidden" value="{{ $category->id }}">
						@elseif(Route::currentRouteName('admin.items.edit'))
							<input name="item_id" type="hidden" value="{{ $item->id }}">
						@endif
						<button type="submit" class="btn btn-link text-danger p-0"><i class="fal fa-trash-alt"></i> Delete</button>
					</form>
				</li>
			</ul>
		</li>
	@endforeach
</ul>
