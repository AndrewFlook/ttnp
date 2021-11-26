<!doctype html>
<html lang="en">
	<head>
		@include('layouts.includes.header')
		<!-- Custom styles for this template -->
		<link href="dashboard.css" rel="stylesheet">
		<style>
			.feather {
				width: 16px;
				height: 16px;
				vertical-align: text-bottom;
			}

			/*
			* Sidebar
			*/

			.sidebar {
				position: fixed;
				top: 0;
				bottom: 0;
				left: 0;
				z-index: 100; /* Behind the navbar */
				padding: 56px 0 0; /* Height of navbar */
				box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
			}

			.sidebar-sticky {
				position: relative;
				top: 0;
				height: calc(100vh - 48px);
				padding-top: .5rem;
				overflow-x: hidden;
				overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
			}

			@supports ((position: -webkit-sticky) or (position: sticky)) {
				.sidebar-sticky {
					position: -webkit-sticky;
					position: sticky;
				}
			}

			.sidebar .nav-link {
				font-weight: 500;
				color: #333;
			}

			.sidebar .nav-link .feather {
				margin-right: 4px;
				color: #999;
			}

			.sidebar .nav-link.active {
				color: #007bff;
			}

			.sidebar .nav-link:hover .feather,
			.sidebar .nav-link.active .feather {
				color: inherit;
			}

			.sidebar-heading {
				font-size: .75rem;
				text-transform: uppercase;
			}

			/*
			* Content
			*/

			[role="main"] {
				padding-top: 56px; /* Space for fixed navbar */
			}

			/*
			* Utilities
			*/

			.border-top { border-top: 1px solid #e5e5e5; }
			.border-bottom { border-bottom: 1px solid #e5e5e5; }
		</style>
	</head>

	<body>
		<nav class="navbar fixed-top navbar-dark bg-dark">
			<span class="navbar-brand col-sm-3 col-md-2 mb-0 h1">
				@if(!empty($contact->name))
					{{ $contact->name }}
				@endif
			</span>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="nav-link" href="{{ route('logout') }}">Sign out</a>
				</li>
			</ul>
		</nav>
		{{-- <nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow">
			<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
				@if(!empty($contact->name))
					{{ $contact->name }}
				@endif
			</a>
			<span class="navbar-text">
				Navbar text with an inline element
			</span>
			<ul class="navbar-nav px-3">
				<li class="nav-item text-nowrap">
					<a class="nav-link" href="{{ route('logout') }}">Sign out</a>
				</li>
			</ul>
		</nav> --}}

		<div class="container-fluid">
			<div class="row">
				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					@include('layouts.admin.navbar')
				</nav>

				<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
						<h1 class="h2">@yield('title')</h1>
					</div>
					@include('layouts.includes.alert')
					@yield('content')
				</main>
			</div>
		</div>
		<!-- Scripts -->
		@include('layouts.includes.footer.scripts')
		<!-- Scripts (end) -->
	</body>
</html>
