<div id="myTabContent" class="tab-content">
	@foreach($categories->sortBy('sort_order') as $cat)
		<div id="{{ $cat->link }}" class="tab-pane fade in">
			@include('layouts.menu.categories.category')
			@include('layouts.menu.categories.options.options')
			@include('layouts.menu.categories.items.items')
		</div>
	@endforeach
</div>
