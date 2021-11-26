<div class="nav-tabs list-group" id="menuNav">
	@foreach($categories->sortBy('sort_order') as $cat)
		<a class="list-group-item" data-toggle="tab" href="#{{ $cat->link }}" aria-expanded="false" aria-controls="collapseExample">
			{{ $cat->name }}
		</a>
	@endforeach
</div>
