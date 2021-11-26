<?php

namespace App;

use App\Category;
use App\Option;
use App\Price;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $dates = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
        'category_id',
        'name',
        'desc',
        'spicy',
        'sort_order',
	];

	public function categories()
	{
		return $this->belongsTo(Category::class);
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
