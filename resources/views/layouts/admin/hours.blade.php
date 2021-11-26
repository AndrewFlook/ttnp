@extends('admin')

@section('title')
	Hours of Operation
@endsection

@section('content')
	<form id="hoursForm" role="form" method="POST" action="{{ route('admin.hours.update', '$hour[]') }}">
		@method('PUT')
		@csrf
		<table class="table table-bordered">
			<thead>
				<tr>
					<th scope="col">Day</th>
					<th scope="col">Open</th>
					<th scope="col">Close</th>
					<th scope="col">Lunch Special Start</th>
					<th scope="col">Lunch Special End</th>
					<th scope="col">Happy Hour Start</th>
					<th scope="col">Happy Hour End</th>
				</tr>
			</thead>
			<tbody>
				@foreach($hours as $hour)
				<tr>
					<th scope="row">{{ $hour->day }}</th>
					<td class="p-0">
						<input name="id" type="hidden" value="{{ $hour->id }}">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_open" name="{{ $hour->day }}_open" class="form-control" placeholder="{{ $hour->day }} opening time" value="{{ $hour->open }}" required>
							<label for="{{ $hour->day }}_open">{{ $hour->day }} Opening</label>
						</div>
					</td>
					<td class="p-0">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_close" name="{{ $hour->day }}_close" class="form-control" placeholder="{{ $hour->day }} closing time" value="{{ $hour->close }}" required>
							<label for="{{ $hour->day }}_close">{{ $hour->day }} Closing</label>
						</div>
					</td>
					<td class="p-0">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_ls_start" name="{{ $hour->day }}_ls_start" class="form-control" placeholder="Start of Lunch Special" value="{{ $hour->ls_start }}">
							<label for="{{ $hour->day }}_ls_start">Lunch Special Start</label>
						</div>
					</td>
					<td class="p-0">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_ls_end" name="{{ $hour->day }}_ls_end" class="form-control" placeholder="End of Lunch Special" value="{{ $hour->ls_end }}">
							<label for="{{ $hour->day }}_ls_end">Lunch Special End</label>
						</div>
					</td>
					<td class="p-0">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_hh_start" name="{{ $hour->day }}_hh_start" class="form-control" placeholder="Start of Happy Hour" value="{{ $hour->hh_start }}">
							<label for="{{ $hour->day }}_hh_start">Happy Hour Start</label>
						</div>
					</td>
					<td class="p-0">
						<div class="form-label-group m-0">
							<input style="border:none;" type="text" id="{{ $hour->day }}_hh_end" name="{{ $hour->day }}_hh_end" class="form-control" placeholder="End of Happy Hour" value="{{ $hour->hh_end }}">
							<label for="{{ $hour->day }}_hh_end">Happy Hour End</label>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<p>
			<small class="form-text text-muted">
				<i class="fal fa-info-circle fa-lg"></i> Happy Hour will only display on the front page if the hours are filled out on this page. Any day with blank happy hour start and end times will not display on the front page.
			</small>
		</p>
		<button class="btn btn-primary" type="submit">Update</button>
	</form>

@endsection
