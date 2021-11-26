<div class="container" style="margin-top: 2rem;">
	@yield('modal')
	<div class="row">
		<div class="col-3">
			@include('layouts.admin.navbar')
		</div>
		<div class="col-9">
			<div class="card">
				<h5 class="card-header">
					@yield('title')
				</h5>
				@yield('content')
			</div>
		</div>
	</div>
</div>
