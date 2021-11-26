<address>
	<strong>
		@if(!empty($contact->name))
			{{ $contact->name }}
		@endif
	</strong><br>
	@if(!empty($contact->street))
		{{ $contact->street }}<br>
	@endif
	@if(!empty($contact->city))
		{{ $contact->city}}, @if(!empty($contact->state)){{ $contact->state }}@endif @if(!empty($contact->zip)){{ $contact->zip }}@endif<br>
	@endif
	@if(!empty($contact->phone))
		<abbr title="Phone #">P:</abbr> {{ $contact->phone }}<br>
	@endif
	@if(!empty($contact->email))
		<abbr title="Email">E:</abbr> {{ $contact->email }}<br>
	@endif
	@if(!empty($contact->manager))
		<abbr title="Managers">Mgr:</abbr> {{ $contact->manager }}
	@endif
</address>
