@extends('admin')

@section('title')
	Admin Dashboard
@endsection

@section('content')
<div class="card-body">
	<h4>Restaurant Management</h4>
	<p class="card-text"><strong>Contact Info</strong> is where restaurant information and contact information can be specified. You may change the name of the restaurant, change the "about the restaurant" description, update the restaurant's address, phone number, email address, and managers to contact.</p>
	<p class="card-text"><strong>Hours of Operation</strong> allows you to specify the restaurant's hours, on a daily basis, including Happy Hour for each day. Only days with Happy Hour start and end times will display a Happy Hour time on the front page.</p>
	<h4>Menu Management</h4>
	<p class="card-text"><strong>Edit Menu</strong> is where you'll edit the menu in it's entirety. It will display Categories first and foremost, click on a category to display items within that category. To view, add, or remove pricing or options to a category or item, click the edit button for the item or category.</p>
	<p class="card-text"><strong>Visit Site</strong> will take you back to the front page to view the currently live menu, the same way that customers and other site visitors will see it.</p>
</div>
@endsection
