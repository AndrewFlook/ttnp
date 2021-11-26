<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\User;
use App\Hours;
use App\Price;
use App\Option;
use App\Contact;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
	public function index()
	{

	}

	public function create()
	{
		$contact = Contact::first();
		$categories = Category::all();
		return view('layouts.admin.create.item', compact(['categories', 'contact']));
	}

	public function store(Request $request)
	{
		/*
		|-------------------------------------
		| Posting a new Menu Item to the DB.
		|-------------------------------------
		|
		| Gather the requested data. Create the object.
		| Redirect the user to main menu.
		|
		*/
		$items = count(Item::where('category_id', '=', $request->category_id)->get());
		$sort = $items + 1;
		if($request->spicy === "on") {
			$request->request->add([
				'spicy' => 1,
			]);
		};
		$request->request->add([
			'sort_order' => $sort,
		]);
		Item::create($request->all());

		Session::flash('status', 'The item was successfully added to the menu!');
		Session::flash('type', 'success');

		if(route('admin.categories.edit', $request->category_id))
		{
			return redirect()->route('admin.categories.edit', $request->category_id);
		} else {
			return redirect()->route('admin.menu.index');
		}
	}

	public function show()
	{

	}

	public function edit(Item $item)
	{
		$contact = Contact::first();
		$categories = Category::all();
		if(!empty($item->category_id)) {
			$category = Category::findOrFail($item->category_id);
		};
		return view('layouts.admin.update.item', compact(['item', 'categories', 'contact', 'category']));
	}

	public function update(Request $request, $id)
	{
		$item = Item::findOrFail($id);
		if($request->spicy === "on") {
			$request->request->add(['spicy' => 1]);
		}
		else {
			$request->request->add(['spicy' => 0]);
		};
		$item->update($request->all());

		Session::flash('status', 'The item was successfully updated!');
		Session::flash('type', 'success');
		return redirect()->route('admin.items.edit', $item->id);
	}

	public function destroy($id)
	{
		/*
		|-------------------------------------
		| Deleting an Item.
		|-------------------------------------
		|
		| Get the requested item. Gather the options belonging to the item.
		| Gather the prices belonging to each option. Delete the prices.
		| Delete the options. Gather the prices for the item itself.
		| Delete the prices, then delete the item. Redirect the
		| user back to the main menu.
		|
		*/

		$item = Item::findOrFail($id);

		$options = $item->options()->get();
		foreach($options as $option)
		{
			foreach($option->prices as $price)
			{
				$price->forceDelete();
			}
			$option->forceDelete();
		}

		$prices = $item->prices()->get();
		foreach($prices as $price)
		{
			$price->forceDelete();
		}

		$item->forceDelete();

		Session::flash('status', 'The item was successfully deleted!');
		Session::flash('type', 'danger');
		return redirect()->route('admin.menu.index');
	}
}
