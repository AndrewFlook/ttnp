@extends('home')

@section('title')
	@if(!empty($contact->name))
		{{ $contact->name }}
	@endif
@endsection

@section('content')
	<!-- Modal -->
	@include('layouts.includes.login')
	<div class="jumbotron">
		@include('layouts.includes.jumbotron')
	</div>
	@include('layouts.includes.message')
	<div class="container">
		@if($disabled->value == "on")
			<div class="collapse" id="menu">
				@include('layouts.menu.menu')
			</div>
		@endif
		<div class="row">
			@include('layouts.contact.contact')
		</div>
	</div>
	<footer>
		@include('layouts.includes.footer.bottom-nav')
	</footer>
@endsection
