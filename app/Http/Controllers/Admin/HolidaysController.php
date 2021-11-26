<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Holidays;
use App\Preferences;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HolidaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $months = Preferences::where('key', 'holidays_display_months_ahead')->first();
		$contact = Contact::first();
		$holidays = Holidays::orderBy('id')->get();
		return view('layouts.admin.holidays', compact(['holidays', 'contact', 'months']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$contact = Contact::first();
        return view('layouts.admin.create.holidays', compact(['contact']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holidays = count(Holidays::all());
		$sort = $holidays + 1;
        if($request->closed === "on") {
			$request->request->add([
				'closed' => 1,
			]);
        };
		$request->request->add([
			'sort_order' => $sort,
		]);
		Holidays::create($request->all());

		Session::flash('status', 'The Holiday was successfully added!');
        Session::flash('type', 'success');
        
        return redirect()->route('admin.holidays.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function show(Holidays $holidays)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$h = Holidays::findOrfail($id);
		$contact = Contact::first();
		return view('layouts.admin.update.holidays', compact(['h', 'contact']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holidays $holidays)
    {
		$h = Holidays::findOrFail($request->id);
		if($request->closed === "on") {
			$request->request->add(['closed' => 1, 'open_at' => '', 'close_at' => '', 'hh_start' => '', 'hh_end' => '']);
		}
		else {
			$request->request->add(['closed' => 0]);
		};
		$h->update($request->all());

		Session::flash('status', 'The Holiday was successfully updated!');
		Session::flash('type', 'success');

		return redirect()->route('admin.holidays.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Holidays  $holidays
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = Holidays::findOrFail($id);

		$holiday->forceDelete();

		Session::flash('status', 'The Holiday has been successfully deleted!');
		Session::flash('type', 'danger');

		return back();
    }
}
