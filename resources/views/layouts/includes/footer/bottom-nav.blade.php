<div id="app" class="container">
    <nav class="navbar fixed-bottom navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="navbar-brand" href="#">&copy; <?php echo date('Y'); ?> @if(!empty($contact->name)){{ $contact->name }}@endif</a>
            </li>
        </ul>
        <ul class="navbar-nav">
			@if(Auth::check())
	            <li class="nav-item mr-4">
					<a href="{{ route('admin.index') }}">Settings</a>
	            </li>
			@endif
			@if(Auth::guest())
				<li class="nav-item">
					<a href="#login" data-toggle="modal" data-target="#login">Login</a>
				</li>
			@else
				<li class="nav-item">
					<a href="{{ route('logout') }}">Logout</a>
				</li>
			@endif
        </ul>
    </nav>
</div>
