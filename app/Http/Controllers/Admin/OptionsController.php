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

class OptionsController extends Controller
{
	public function index()
	{

	}

	public function create()
	{

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
		if(!empty($request->item_id)) {
			$options = count(Option::where('item_id', '=', $request->item_id)->get());
			$sort = $options + 1;
			$request->request->add([
				'sort_order' => $sort,
			]);
			Option::create($request->except(['category_id']));
			Session::flash('status', 'The option has been successfully added!');
			Session::flash('type', 'success');
			return redirect()->route('admin.items.edit', $request->item_id);
		} else {
			$options = count(Option::where('category_id', '=', $request->category_id)->get());
			$sort = $options + 1;
			$request->request->add([
				'sort_order' => $sort,
			]);
			Option::create($request->except(['item_id']));
			Session::flash('status', 'The option has been successfully added!');
			Session::flash('type', 'success');
			return redirect()->route('admin.categories.edit', $request->category_id);
		}
	}

	public function show()
	{

	}

	public function edit(Item $item)
	{
		$categories = Category::all();
		return view('layouts.admin.update.item', compact(['item', 'categories']));
	}

	public function update(Request $request, $id)
	{
		$option = Option::findOrFail($id);

		if(count($option->prices) >= 1) {
			foreach($request->price_id as $pid) {
				$pdetail = Price::find($pid);
				$pdetail->cost = $request->price_cost[$pid];
				$pdetail->desc = $request->price_desc[$pid];
				$pdetail->save();
			}
		}

		if(!empty($request->item_id)) {
			$request->request->set('category_id',null);
			$option->update($request->all());
			Session::flash('status', 'The option has been successfully updated!');
			Session::flash('type', 'success');
			return redirect()->route('admin.items.edit', $request->item_id);
		} else {
			$option->update($request->all());
			Session::flash('status', 'The option has been successfully updated!');
			Session::flash('type', 'success');
			return redirect()->route('admin.categories.edit', $request->category_id);
		}
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
		$option = Option::findOrFail($id);

		if(!empty($option->category_id))
		{
			$category = Category::findOrFail($option->category_id);

			$prices = $option->prices()->get();
			foreach($prices as $price)
			{
				$price->forceDelete();
			}
			$option->forceDelete();

			Session::flash('status', 'The option has been successfully deleted!');
			Session::flash('type', 'danger');
			return redirect()->route('admin.categories.edit', $category->id);
		}

		if(!empty($option->item_id))
		{
			$item = Item::findOrFail($option->item_id);

			$prices = $option->prices()->get();
			foreach($prices as $price)
			{
				$price->forceDelete();
			}
			$option->forceDelete();

			Session::flash('status', 'The option has been successfully deleted!');
			Session::flash('type', 'danger');
			return redirect()->route('admin.items.edit', $item->id);
		}
	}
}
