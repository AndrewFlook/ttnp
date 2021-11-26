<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Contact;
use App\Hours;
use App\Category;
use App\Item;
use App\Option;
use App\Price;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SortController extends Controller
{
    public function moveUp (Request $request)
	{
		switch($request->submit) {
			case 'category':
				$cat = Category::findOrFail($request->id);
				$catsort = $cat->sort_order;
				if($catsort <= 1) {
					return redirect()->back();
				} else {
					$other = Category::where('sort_order', '=', $catsort - 1)->first();
					$cat->sort_order = $cat->sort_order - 1;
					$other->sort_order = $other->sort_order + 1;
					$cat->save();
					$other->save();
					return redirect()->back();
				}
			break;

			case 'item':
				$item = Item::findOrFail($request->id);
				$itemsort = $item->sort_order;
				if($itemsort <= 1) {
					return redirect()->back();
				} else {
					$other = Item::where('sort_order', '=', $itemsort - 1)->where('category_id', '=', $item->category_id)->first();
					$item->sort_order = $item->sort_order - 1;
					$other->sort_order = $other->sort_order + 1;
					$item->save();
					$other->save();
					return redirect()->back();
				}
			break;

			case 'option':
				$option = Option::findOrFail($request->id);
				$optionsort = $option->sort_order;
				if($optionsort <= 1) {
					return redirect()->back();
				} else {
					$other = Option::where('sort_order', '=', $optionsort - 1)->where('category_id', '=', $option->category_id)->where('item_id', '=', $option->item_id)->first();
					$option->sort_order = $option->sort_order - 1;
					$other->sort_order = $other->sort_order + 1;
					$option->save();
					$other->save();
					return redirect()->back();
				}
			break;
		}
	}

	public function moveDown (Request $request)
	{
		switch($request->submit) {
			case 'category':
				$cat = Category::findOrFail($request->id);
				$catsort = $cat->sort_order;
				if($catsort == count(Category::all())) {
					return redirect()->back();
				} else {
					$other = Category::where('sort_order', '=', $catsort + 1)->first();
					$cat->sort_order = $cat->sort_order + 1;
					$other->sort_order = $other->sort_order - 1;
					$cat->save();
					$other->save();
					return redirect()->back();
				}
			break;

			case 'item':
				$item = Item::findOrFail($request->id);
				$itemsort = $item->sort_order;
				if($itemsort == count(Item::where('category_id', '=', $item->category_id)->get())) {
					return redirect()->back();
				} else {
					$other = Item::where('sort_order', '=', $itemsort + 1)->where('category_id', '=', $item->category_id)->first();
					$item->sort_order = $item->sort_order + 1;
					$other->sort_order = $other->sort_order - 1;
					$item->save();
					$other->save();
					return redirect()->back();
				}
			break;

			case 'option':
				$option = Option::findOrFail($request->id);
				$optionsort = $option->sort_order;
				if($optionsort == count(Option::where('category_id', '=', $option->category_id)->where('item_id', '=', $option->item_id)->get())) {
					return redirect()->back();
				} else {
					$other = Option::where('sort_order', '=', $optionsort + 1)->where('category_id', '=', $option->category_id)->where('item_id', '=', $option->item_id)->first();
					$option->sort_order = $option->sort_order + 1;
					$other->sort_order = $other->sort_order - 1;
					$option->save();
					$other->save();
					return redirect()->back();
				}
			break;
		}
	}
}
