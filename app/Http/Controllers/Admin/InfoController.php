<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
	public function index(Contact $contact)
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
		return view('layouts.admin.info', compact(['contact']));
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
		| Posting the Restaurant Info.
		|-------------------------------------
		|
		| Gather the requested data. Update the DB.
		| Redirect the user to main menu.
		|
		*/
		Session::flash('status', 'The information has been successfully updated!');
		Session::flash('type', 'success');
		$contact = Contact::first();
		$contact->update($request->all());
		return redirect()->route('admin.info.index');
	}

	public function destroy()
	{

	}
}
