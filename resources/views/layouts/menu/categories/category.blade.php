<h2 style="margin-top:0px;">
	{{ $cat->name }}
</h2>
@if(!empty($cat->desc))
	<p class="mb-1">{{ $cat->desc }}</p>
@endif
@if(count($cat->prices) >= 1)
	<ul class="list-inline">
		@foreach($cat->prices as $price)
			<li class="list-inline-item">@if($price->desc){{ $price->desc }}: @endif${{ $price->cost }}</li>
		@endforeach
	</ul>
@endif
