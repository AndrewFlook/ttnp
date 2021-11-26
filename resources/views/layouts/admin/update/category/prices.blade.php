<h5 class="card-header" style="border-top:1px solid rgba(0,0,0,.125)">
	Pricing
	<small class="text-muted ml-2">
		@if(count($category->prices) == 0)
			There are currently <strong>NO prices</strong> in this category.
		@elseif(count($category->prices) == 1)
			<strong>1 price</strong> in this category:
		@elseif(count($category->prices) >= 2)
			<strong>{{ count($category->prices) }} prices</strong> in this category:
		@endif
	</small>
	<small class="float-right">
		<ul class="list-inline mb-0 py-1">
			<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#addPrice">Add Price</a></li>
		</ul>
	</small>
</h5>
<ul class="list-group list-group-flush">
	@foreach($category->prices as $price)
		@include('layouts.admin.modals.price-edit')
		<li class="list-group-item">
			@if($price->desc){{ $price->desc }}@endif
			<ul class="list-inline float-right mb-0">
				<li class="list-inline-item">${{ $price->cost }}</li>
				<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#editPrice-{{ $price->id }}"><i class="fal fa-edit"></i> Edit</a></li>
				<li class="list-inline-item">
					<form method="POST" action="{{ route('admin.prices.destroy', $price->id) }}">
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
