@extends('admin')

@section('title')
	Holiday Hours
@endsection

@section('content')

		<p>
			Holidays shown on the front page are only displayed if they are between today and the option set below.<br />
			All others will not be shown until they are within the option below. You may choose up to 3 months.
		</p>

		<div class="container-fluid my-3">
			<div class="row col-12">
				<a href="{{ route('admin.holidays.create') }}" class="btn btn-primary"><i class="fal fa-plus fa-lg mr-1"></i>Add Holiday</a>
				<div class="form-group row col-md-10 mb-0 justify-content-center"><!-- category -->
					<label for="{{ $months->key }}" class="col-md-4 col-form-label">Show Holidays these many months ahead:</label>
					<form method="POST" action="{{ route('admin.preferences.update', $months->key) }}" class="row col-md-4">
						@method('PATCH')
						@csrf
						<select class="form-control col-sm-8" id="value" name="value">
							<option value="1" {{ $months->value == "1" ? 'selected' : '' }}>1 Month</option>
							<option value="2" {{ $months->value == "2" ? 'selected' : '' }}>2 Months</option>
							<option value="3" {{ $months->value == "3" ? 'selected' : '' }}>3 Months</option>
						</select>
						<input type="hidden" name="key" id="key" value="{{ $months->key }}" />
						<button type="submit" class="btn btn-primary p-0 col-md-2 ml-2">Save</button>
					</form>
				</div><!-- category -->
			</div>
		</div>
		@if(count($holidays) >= 1)
			<table class="table table-hover table-striped table-sm">
				<thead>
					<tr>
						<th>Name</th>
						<th>Date</th>
						<th>Open or Closed?</th>
						<th>Open At</th>
						<th>Close At</th>
						<th>Happy Hour Start</th>
						<th>Happy Hour End</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($holidays as $h)
						<tr>
							<td>{{ $h->name }}</td>
							<td>{{ $h->date->toFormattedDateString() }}</td>
							<td><strong>{{ $h->closed == "1" ? 'CLOSED' : 'OPEN' }}</strong></td>
							<td>{{ $h->open_at }}</td>
							<td>{{ $h->close_at }}</td>
							<td>{{ $h->hh_start }}</td>
							<td>{{ $h->hh_end }}</td>
							<td class="btn-toolbar">
								<a href="{{ route('admin.holidays.edit', $h->id) }}" class="btn btn-outline-primary"><i class="fal fa-pencil mr-1"></i>Edit</a>
								<form method="POST" action="{{ route('admin.holidays.destroy', $h->id) }}" class="ml-2">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-outline-danger"><i class="fal fa-trash-alt mr-1"></i>Delete</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		@endif

@endsection
