<dl class="row">
	@foreach ($hours as $hour)
		<dt class="col-sm-4">
			<p>
				{{ $hour->day }}
			</p>
		</dt>
		<dd class="col-sm-8">
			<p>
				{{ $hour->open }} &ndash; {{ $hour->close }}
			</p>
			@if(isset($hour->hh_start))
				<p>
					HH: {{ $hour->hh_start }} &ndash; {{ $hour->hh_end }}
				</p>
			@endif
		</dd>
	@endforeach
</dl>
