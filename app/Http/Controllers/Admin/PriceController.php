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

class PriceController extends Controller
{
	public function index()
	{
		return view('layouts.admin.dashboard');
	}

	public function create()
	{

	}

	public function store(Request $request)
	{
		/*
		|-------------------------------------
		| Posting a Price to the DB.
		|-------------------------------------
		|
		| Gather the requested data. Create the object.
		| Redirect the user to main menu.
		|
		*/

		if(!empty($request->option_id)) {
			$options = count(Price::where('option_id', '=', $request->option_id)->get());
			$sort = $options + 1;
			$request->request->add([
					'sort_order' => $sort,
				]);
			Price::create($request->except(['category_id', 'item_id']));
		} elseif(empty($request->option_id)) {
			if(!empty($request->category_id && empty($request->item_id))) {
				$categories = count(Price::where('category_id', '=', $request->category_id)->get());
				$sort = $categories + 1;
				$request->request->add([
						'sort_order' => $sort,
					]);
				Price::create($request->all());
			} elseif(!empty($request->item_id) && empty($request->category_id)) {
				$items = count(Price::where('item_id', '=', $request->item_id)->get());
				$sort = $items + 1;
				$request->request->add([
						'sort_order' => $sort,
					]);
				Price::create($request->all());
			}
		}

		Session::flash('status', 'The price has been successfully added!');
		Session::flash('type', 'success');

		if(!empty($request->category_id)) {
			return redirect()->route('admin.categories.edit', $request->category_id);
		} else {
			return redirect()->route('admin.items.edit', $request->item_id);
		}
	}

	public function show()
	{

	}

	public function edit()
	{

	}

	public function update(Request $request, $id)
	{
		$price = Price::findOrFail($id);

		if(!empty($price->category_id))
		{
			$category = Category::findOrFail($price->category_id);

			$price->update($request->all());

			Session::flash('status', 'The price has been successfully updated!');
			Session::flash('type', 'success');
			return redirect()->route('admin.categories.edit', $category->id);
		}
		if(!empty($price->item_id))
		{
			$item = Item::findOrFail($price->item_id);

			$price->update($request->all());

			Session::flash('status', 'The price has been successfully updated!');
			Session::flash('type', 'success');
			return redirect()->route('admin.items.edit', $item->id);
		}
	}

	public function destroy($id)
	{
		$price = Price::findOrFail($id);

		$price->forceDelete();

		Session::flash('status', 'The price has been successfully deleted!');
		Session::flash('type', 'danger');

		return back();
	}
}
