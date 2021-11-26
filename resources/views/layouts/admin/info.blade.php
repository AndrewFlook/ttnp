@extends('admin')

@section('title')
	Contact Info
@endsection

@section('content')

	<form id="infoForm" role="form" method="POST" action="{{ route('admin.info.update', $contact->id) }}">
		@method('PUT')
		@csrf
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Restaurant Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="Restaurant Name" value="{{ $contact->name }}" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="desc" class="col-sm-2 col-form-label">About the Restaurant</label>
			<div class="col-sm-10">
				<textarea class="form-control" id="desc" name="desc" rows="3" placeholder="About the Restaurant" value="{{ $contact->desc }}" required>{{ $contact->desc }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<label for="name" class="col-sm-2 col-form-label">Restaurant Address</label>
			<div class="form-row col-sm-10">
				<div class="form-label-group col-md-5 mb-0">
					<input type="text" id="street" name="street" class="form-control" placeholder="Street address" value="{{ $contact->street }}" required>
					<label for="street">Street Address</label>
				</div>
				<div class="form-label-group col-md-3 mb-0">
					<input type="text" id="city" name="city" class="form-control" placeholder="City" value="{{ $contact->city }}" required>
					<label for="city">City</label>
				</div>
				<div class="form-label-group col-md-2 mb-0">
					<input type="text" id="state" name="state" class="form-control" placeholder="State" value="{{ $contact->state }}" required>
					<label for="state">State</label>
				</div>
				<div class="form-label-group col-md-2 mb-0">
					<input type="text" id="zip" name="zip" class="form-control" placeholder="Zip code" value="{{ $contact->zip }}" required>
					<label for="zip">Zip Code</label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ $contact->phone }}" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="{{ $contact->email }}" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<label for="manager" class="col-sm-2 col-form-label">Manager(s)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="manager" name="manager" placeholder="Manager(s)" value="{{ $contact->manager }}" required autofocus>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-sm-10">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</div>
	</form>

@endsection
