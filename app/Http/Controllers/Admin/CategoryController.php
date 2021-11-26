<?php

namespace App\Http\Controllers\Admin;

use App\Item;
use App\Price;
use App\Option;
use App\Contact;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
	public function index(Category $categories, Item $items, Option $options, Price $prices)
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

		$categories = Category::all();
		$items = Item::all();
		$empty = Item::whereNull('category_id')->get();
		$options = Option::all();
		$prices = Price::all();

		return view('layouts.admin.menu', compact(['categories', 'items', 'options', 'prices', 'empty']));
	}

	public function create() {
		$contact = Contact::first();
		return view('layouts.admin.create.category', compact(['contact']));
	}

	public function store(Request $request)
	{
		/*
		|-------------------------------------
		| Posting a new Menu Category to the DB.
		|-------------------------------------
		|
		| Gather the requested data. Create the object.
		| Redirect the user to main menu.
		|
		*/
		// dd($request->all());
		$categories = count(Category::all());
		$sort = $categories + 1;
		Session::flash('status', 'The category was successfully created!');
		Session::flash('type', 'success');
		$link = str_slug($request->name);
		$request->request->add([
				'link' => $link,
				'sort_order' => $sort,
			]);
		Category::create($request->all());
		return redirect()->route('admin.menu.index');
	}

	public function show()
	{

	}

	public function edit(Category $category)
	{
		$item = Item::where('category_id', '=', $category->id)->get();
		$contact = Contact::first();
		$categories = Category::all();
		return view('layouts.admin.update.category', compact(['category', 'categories', 'contact', 'item']));
	}

	public function update(Request $request, $id)
	{
		$cat = Category::findOrFail($id);

		$link = str_slug($request->name);
		$request->request->add(['link' => $link]);
		$cat->update($request->all());

		Session::flash('status', 'The category was successfully updated!');
		Session::flash('type', 'success');
		return redirect()->route('admin.menu.index');
	}

	public function destroy($id)
	{
		/*
		|-------------------------------------
		| Deleting a Category
		|-------------------------------------
		|
		| Get the requested object. Gather the items belonging to the object.
		| Delete the parent object's ID from the child object's dataset.
		| Delete the parent object and redirect the to the main menu.
		|
		*/

		$category = Category::findOrFail($id);

		$options = $category->options()->get();
		foreach($options as $option)
		{
			foreach($option->prices as $price)
			{
				$price->delete();
			}
			$option->delete();
		}

		$items = $category->items()->get();
		foreach($items as $item)
		{
			$item->category_id = null;
			$item->save();
		}
		$category->forceDelete();

		Session::flash('status', 'The category was successfully deleted!');
		Session::flash('type', 'danger');
		return redirect()->route('admin.menu.index');
	}

}
