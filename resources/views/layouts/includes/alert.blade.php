@if(Session::has('status'))
	<div class="container">
		<div class="alert alert-{{ Session::get('type') }}" role="alert">
			{{ Session::get('status') }}
		</div>
	</div>
@endif
