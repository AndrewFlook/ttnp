<dl>
	@foreach($cat->items->sortBy('sort_order') as $item)
		<dt>
			{{ $item->name }} @if($item->spicy == 1)<i class="fas fa-fire" style="color: Tomato;" title="Spicy!"></i>@endif
			@include('layouts.menu.categories.items.prices')
		</dt>
		<dd @if(count($item->options) >= 1) class="mb-0" @endif>
			{{ $item->desc }}
		</dd>
		@if(count($item->options) >= 1)
			<ul class="list-unstyled mb-1">
				@foreach($item->options->sortBy('sort_order') as $option)
					@include('layouts.menu.categories.items.options.options')
				@endforeach
			</ul>
		@endif
	@endforeach
</dl>
