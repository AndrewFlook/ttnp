@extends('admin')

@section('title')
	Add Holiday Hours
@endsection

@section('content')

		<p>
			Holidays shown on the front page are only displayed if they are between today and the option set below.<br />
			All others will not be shown until they are within the option below. You may choose up to 3 months.
		</p>

    <form id="holiday" role="form" method="POST" action="{{ route('admin.holidays.store') }}">
        @method('POST')
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Holiday Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Holiday Name" required autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="date" name="date" placeholder="2020-02-28">
            </div>
        </div>
        <div class="form-group form-check"><!-- closed? -->
            <input type="checkbox" class="form-check-input" id="closed" name="closed">
            <label class="form-check-label" for="exampleCheck1">
                Closed all day?
            </label>
        </div><!-- closed -->
        <div class="form-group row">
            <label for="open_at" class="col-sm-2 col-form-label">Open at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="open_at" name="open_at" placeholder="10:00 am">
            </div>
        </div>
        <div class="form-group row">
            <label for="close_at" class="col-sm-2 col-form-label">Close at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="close_at" name="close_at" placeholder="10:00 pm">
            </div>
        </div>
        <div class="form-group row">
            <label for="hh_start" class="col-sm-2 col-form-label">Happy Hour starts at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="hh_start" name="hh_start" placeholder="10:00 am">
            </div>
        </div>
        <div class="form-group row">
            <label for="hh_end" class="col-sm-2 col-form-label">Happy Hour ends at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="hh_end" name="hh_end" placeholder="10:00 am">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Holiday</button>
            </div>
        </div>
    </form>

@endsection
