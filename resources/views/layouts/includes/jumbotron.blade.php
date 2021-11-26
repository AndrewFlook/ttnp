<div class="container">
	@if(!empty($contact->name))
		<h1 style="color: #FFF">
			{{ $contact->name }}
		</h1>
	@endif
	@if(!empty($contact->desc))
		<p style="color: #FFF">
			{{ $contact->desc }}
		</p>
	@endif
	@if($disabled->value == "on")
		@if(!empty($categories))
			<p style="color: #FFF">
				<a class="btn btn-primary btn-lg" data-toggle="collapse" href="#menu" role="button">View Our Menu</a>
			</p>
		@endif
	@endif
</div>
