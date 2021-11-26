@extends('admin')

@section('title')
	Message for Visitors
@endsection

@section('content')

	@if(!isset($message))
		<form id="messageForm" role="form" method="POST" action="{{ route('admin.messages.store') }}">
			@csrf
			<div class="form-group row">
				<label for="title" class="col-sm-2 col-form-label">Message Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" placeholder="Message title, like maybe 'Closed for 4th of July' or something" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="primary" class="col-sm-2 col-form-label">Message content</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="primary" name="primary" rows="3" placeholder="Required, the main info you're trying to convey to visitors." required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="secondary" class="col-sm-2 col-form-label">Message sub-content</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="secondary" name="secondary" placeholder="Optional, additional info. Like, maybe some info about how to contact us if anyone has any questions" autofocus>
				</div>
			</div>
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Message Type</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="type" id="type1" value="info">
							<label class="form-check-label" for="type1">
								Information
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="type" id="type2" value="warning">
							<label class="form-check-label" for="type2">
								Warning
							</label>
						</div>
						<div class="form-check disabled">
							<input class="form-check-input" type="radio" name="type" id="type3" value="danger">
							<label class="form-check-label" for="type3">
								Danger
							</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="form-group row">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Create</button>
				</div>
			</div>
		</form>
	@else
		<form id="messageForm" role="form" method="POST" action="{{ route('admin.messages.update', $message->id) }}">
			@method('PUT')
			@csrf
			<div class="form-group row">
				<label for="title" class="col-sm-2 col-form-label">Message Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="title" name="title" placeholder="Message title, like maybe 'Closed for 4th of July' or something" value="{{ $message->title }}" required autofocus>
				</div>
			</div>
			<div class="form-group row">
				<label for="primary" class="col-sm-2 col-form-label">Message content</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="primary" name="primary" rows="3" placeholder="Required, the main info you're trying to convey to visitors." value="{{ $message->primary }}" required>{{ $message->primary }}</textarea>
				</div>
			</div>
			<div class="form-group row">
				<label for="secondary" class="col-sm-2 col-form-label">Message sub-content</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="secondary" name="secondary" placeholder="Optional, additional info. Like, maybe some info about how to contact us if anyone has any questions" value="{{ $message->secondary }}" autofocus>
				</div>
			</div>
			<fieldset class="form-group">
				<div class="row">
					<legend class="col-form-label col-sm-2 pt-0">Message Type</legend>
					<div class="col-sm-10">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="type" id="type1" value="info" {{ ($message->type == "info") ? 'checked' : '' }}>
							<label class="form-check-label" for="type1">
								Information
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="type" id="type2" value="warning" {{ ($message->type == "warning") ? 'checked' : '' }}>
							<label class="form-check-label" for="type2">
								Warning
							</label>
						</div>
						<div class="form-check disabled">
							<input class="form-check-input" type="radio" name="type" id="type3" value="danger" {{ ($message->type == "danger") ? 'checked' : '' }}>
							<label class="form-check-label" for="type3">
								Danger
							</label>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="form-group float-left">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</div>
		</form>
		<form method="POST" action="{{ route('admin.messages.destroy', $message->id) }}">
			@method('DELETE')
			@csrf
			<div class="form-group float-right">
				<div class="col-sm-10">
					<button type="submit" class="btn btn-danger">Delete</button>
				</div>
			</div>
		</form>
	@endif

@endsection
