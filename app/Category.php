<?php

namespace App;

use App\Item;
use App\Option;
use App\Price;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $dates = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
        'name',
        'link',
        'desc',
        'desc_options',
        'spicy',
        'sort_order',
	];

	public function items()
	{
		return $this->hasMany(Item::class);
	}

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
