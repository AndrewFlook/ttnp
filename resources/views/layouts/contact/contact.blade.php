<div class="col-lg-7 col-sm-12">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h2>Our Hours</h2>
			@include('layouts.contact.hours')
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12">
			<h2>Contact Us</h2>
			@include('layouts.contact.info')
		</div>
	</div>
	@if(count($holidays) >= 1)
		<dl class="row">
			@foreach($holidays as $h)
				<dt class="col-sm-3">{{ $h->name }}</dt>
				<dd class="col-sm-9">
					<span class="mr-4">{{ $h->closed ? 'Closed' : 'Open'}}</span>
					@if($h->closed == 0)
						{{ $h->open_at}} &ndash; {{ $h->close_at }}
					@endif
					@if(!empty($h->hh_start))
						<span class="ml-4">HH: {{ $h->hh_start}} &ndash; {{ $h->hh_end }}</span>
					@endif
				</dd>
			@endforeach
		</dl>
	@endif
	<h2>Our Location</h2>
	@include('layouts.contact.location')
</div>
<div class="col-lg-5 col-sm-12">
	<h2>Social Media</h2>
	@include('layouts.contact.facebook')
</div>
