@foreach($option->prices as $price)
	@if($price->menu_option_id = $option->id)
		<strong class="float-right">+${{ $price->cost }}</strong>
	@endif
@endforeach
