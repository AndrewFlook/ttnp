@extends('admin')

@section('title')
	Editing Item: {{ $item->name }}
@endsection

@section('content')

	@include('layouts.admin.modals.option-add')
	@include('layouts.admin.modals.price-add')
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="{{ route('admin.menu.index') }}">Menu</a></li>
			@if(!empty($item->category_id))
			<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></li>
			@else
			<li class="breadcrumb-item" aria-current="page">Uncategorized Items</li>
			@endif
			<li class="breadcrumb-item active" aria-current="page">{{ $item->name }}</li>
		</ol>
	</nav>
	<div class="card">
		@include('layouts.admin.update.item.info')
		@include('layouts.admin.update.item.prices')
		@include('layouts.admin.update.item.options')
	</div>

@endsection
