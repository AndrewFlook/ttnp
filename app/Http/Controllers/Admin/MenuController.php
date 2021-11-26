<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Item;
use App\User;
use App\Hours;
use App\Price;
use App\Option;
use App\Contact;
use App\Category;
use Carbon\Carbon;
use App\Preferences;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $categories, Item $items, Option $options, Price $prices, Contact $contact)
	{
		/*
		|-------------------------------------
		| Display the Menu Management page.
		|-------------------------------------
		|
		| Gather the requested data.
		| Display the data.
		|
        */
        $disabled = Preferences::where('key', '=', 'menu_status')->first();
		$contact = Contact::first();
		$categories = Category::all();
		$items = Item::all();
		$empty = Item::whereNull('category_id')->get();
		$options = Option::all();
		$prices = Price::all();
		$updatedCats = Category::orderByDesc('updated_at')->first();
		$updatedItems = Item::orderByDesc('updated_at')->first();
		$updatedOptions = Option::orderByDesc('updated_at')->first();
		$updatedPrices = Price::orderByDesc('updated_at')->first();
		$collection = collect([$updatedCats,$updatedItems,$updatedOptions,$updatedPrices]);
        $updatedat = $collection->sortByDesc('updated_at')->first();
        if($updatedat == !null) {
    		$updated = Carbon::instance($updatedat->updated_at)->toDayDateTimeString();
            $updatedforHumans = Carbon::instance($updatedat->updated_at)->diffForHumans();
            return view('layouts.admin.menu', compact(['categories', 'items', 'options', 'prices', 'empty', 'contact', 'updated', 'updatedforHumans', 'disabled']));
        } else {
            $updated = 'No updates available.';
            return view('layouts.admin.menu', compact(['categories', 'items', 'options', 'prices', 'empty', 'contact', 'updated', 'disabled']));
        };

	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
