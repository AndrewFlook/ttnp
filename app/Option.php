<?php

namespace App;


use App\Category;
use App\Item;
use App\Price;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	protected $dates = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'category_id',	// if the option belongs to a category, store the category ID
		'item_id', 		// if the option belongs to an item, store the item ID
		'desc',			// chicken, beef, pork, seafood, etc
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

	public function prices()
	{
		return $this->hasMany(Price::class);
	}
}
