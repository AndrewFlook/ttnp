<li>
	{{ $option->desc }}
	@if($option->spicy===1)
		<i class="fa fa-fire" aria-hidden="true"></i>
	@endif
	@include('layouts.menu.categories.items.options.prices')
</li>
