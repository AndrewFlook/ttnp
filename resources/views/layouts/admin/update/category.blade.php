@extends('admin')

@section('title')
	Editing Category: {{ $category->name }}
@endsection

@section('content')

	@include('layouts.admin.modals.option-add')
	@include('layouts.admin.modals.price-add')
	@include('layouts.admin.modals.item')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
			<li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
		</ol>
	</nav>
	<div class="card">
		@include('layouts.admin.update.category.info')
		@include('layouts.admin.update.category.prices')
		@include('layouts.admin.update.category.options')
		@include('layouts.admin.update.category.items')
	</div>

@endsection
