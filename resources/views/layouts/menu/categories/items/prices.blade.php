<div class="pull-right" style="height: 0px;">
	<strong>
		<ul class="list-inline">
		@foreach($item->prices as $price)
			@if($price->menu_item_id = $item->id && $price->menu_option_id == null)
				<li class="list-inline-item mb-1">@if(!empty($price->desc)){{ $price->desc }}: @endif${{ $price->cost }}</li>
			@endif
		@endforeach
		<ul>
	</strong>
</div>
