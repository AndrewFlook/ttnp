<h5 class="card-header" style="border-top:1px solid rgba(0,0,0,.125)">
	Items
	<small class="text-muted ml-2">
		@if(count($category->items) == 0)
			There are currently <strong>NO items</strong> in this category.
		@elseif(count($category->items) == 1)
			<strong>1 item</strong> in this category:
		@elseif(count($category->items) >= 2)
			<strong>{{ count($category->items) }} items</strong> in this category:
		@endif
	</small>
	<small class="float-right">
		<ul class="list-inline mb-0 py-1">
			<li class="list-inline-item"><a href="#" class="text-primary" data-toggle="modal" data-target="#addItem">Add Item</a></li>
		</ul>
	</small>
</h5>
<ul class="list-group list-group-flush">
	@foreach($category->items->sortBy('sort_order') as $item)
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
