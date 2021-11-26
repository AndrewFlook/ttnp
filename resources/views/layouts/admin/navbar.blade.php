<div class="sidebar-sticky">
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.index') ? 'active' : '' }}" href="{{ route('admin.index') }}">
				<span data-feather="home"></span>
				Dashboard <span class="sr-only">(current)</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="{{ route('home') }}">Visit Site</a>
		</li>
	</ul>
	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		<span>Restaurant Management</span>
		<a class="d-flex align-items-center text-muted" href="#">
			<span data-feather="plus-circle"></span>
		</a>
	</h6>
	<ul class="nav flex-column">
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.info.index') ? 'active' : '' }}" href="{{ route('admin.info.index') }}">
				<span data-feather="file"></span>
				Contact Info
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.hours.index') ? 'active' : '' }}" href="{{ route('admin.hours.index') }}">
				<span data-feather="shopping-cart"></span>
				Hours of Operation
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.holidays.index') ? 'active' : '' }}" href="{{ route('admin.holidays.index') }}">
				<span data-feather="shopping-cart"></span>
				Holiday Hours
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.messages.index') ? 'active' : '' }}" href="{{ route('admin.messages.index') }}">
				<span data-feather="shopping-cart"></span>
				Message for Visitors
			</a>
		</li>
	</ul>

	<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		<span>Menu Management</span>
		<a class="d-flex align-items-center text-muted" href="#">
			<span data-feather="plus-circle"></span>
		</a>
	</h6>
	<ul class="nav flex-column mb-2">
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.menu.index') ? 'active' : '' }}" href="{{ route('admin.menu.index') }}">
				<span data-feather="file-text"></span>
				Edit Menu
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.categories.create') ? 'active' : '' }}" href="{{ route('admin.categories.create') }}">
				<span data-feather="file-text"></span>
				Add Category
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Route::currentRouteNamed('admin.items.create') ? 'active' : '' }}" href="{{ route('admin.items.create') }}">
				<span data-feather="file-text"></span>
				Add Item
			</a>
		</li>
	</ul>
</div>
