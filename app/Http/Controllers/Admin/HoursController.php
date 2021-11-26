<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Hours;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HoursController extends Controller
{
	public function index(Hours $hours)
	{
		/*
		|-------------------------------------
		| Display the Restaurant Info page.
		|-------------------------------------
		|
		| Gather the requested data.
		| Display the data.
		|
		*/
		$contact = Contact::first();
		$hours = Hours::orderBy('id')->get();
		return view('layouts.admin.hours', compact(['hours', 'contact']));
	}

	public function create()
	{

	}

	public function store()
	{

	}

	public function show()
	{

	}

	public function edit()
	{

	}

	public function update(Request $request)
	{
		/*
		|-------------------------------------
		| Posting the Hours of Operation.
		|-------------------------------------
		|
		| Gather the requested data. Update the DB.
		| Redirect the user to main menu.
		|
		*/
		$hours = Hours::orderBy('id')->get();
		Session::flash('status', 'The hours have been successfully updated!');
		Session::flash('type', 'success');
		foreach($hours as $hour)
		{
			$hour->open = $request->input($hour->day . '_open');
			$hour->close = $request->input($hour->day . '_close');
			$hour->ls_start = $request->input($hour->day . '_ls_start');
			$hour->ls_end = $request->input($hour->day . '_ls_end');
			$hour->hh_start = $request->input($hour->day . '_hh_start');
			$hour->hh_end = $request->input($hour->day . '_hh_end');
			$hour->update();
		}
		return redirect()->route('admin.hours.index');

	}

	public function destroy()
	{

	}
}
