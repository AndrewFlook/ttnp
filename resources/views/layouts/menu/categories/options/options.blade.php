@if(!empty($cat->desc_options))
	<p class="mb-1">{{ $cat->desc_options }}</p>
@endif
<ul class="list-unstyled">
	@foreach($cat->options->sortBy('sort_order') as $option)
		@if($option->category_id = $cat->id && $option->item_id == null)
			<li>
				{{ $option->desc }}
				@if($option->spicy===1)
					<i class="fal fa-fire" aria-hidden="true"></i>
				@endif
				@include('layouts.menu.categories.options.prices')
			</li>
		@endif
	@endforeach
</ul>
