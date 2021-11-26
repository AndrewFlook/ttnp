<?php

namespace App;

use App\Category;
use App\Item;
use App\Option;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
	protected $dates = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'category_id',		// if it belongs to a category, store the category ID
		'item_id',			// if it belongs to an item, store the item ID
		'option_id',		// if it belongs to an item option, store the option ID
		'desc',				// regular, small, medium, large
		'cost',				// $2.50
		'sort_order',
	];

	public function categories()
	{
		return $this->belongsTo(Category::class);
	}

	public function items()
	{
		return $this->belongsTo(Item::class);
	}

	public function options()
	{
		return $this->belongsTo(Option::class);
	}
}
