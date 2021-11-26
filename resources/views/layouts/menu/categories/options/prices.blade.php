<span class="pull-right">
	<strong>
		@foreach($option->prices as $price)
			@if($price->item_id == null)
				@if(!empty($price->desc)){{ $price->desc }}: @endif${{ $price->cost }}
			@endif
		@endforeach
	</strong>
</span>
