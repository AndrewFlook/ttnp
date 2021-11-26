<?php

namespace App;

use Carbon\Carbon;
use App\Preferences;
use Illuminate\Database\Eloquent\Model;

class Holidays extends Model
{
    protected $dates = [
		'created_at',
		'updated_at',
		'date',
	];

	protected $fillable = [
		'name',
        'date',
        'closed',
		'open_at',
		'close_at',
		'hh_start',
		'hh_end',
		'sort_order',
	];

	public function display()
	{
		$months = Preferences::where('key', 'holidays_display_months_ahead')->get();
		$first = Carbon::now();
		$second = Carbon::now()->addMonths($months->value);
		$holidays = Holidays::whereBetween('date', [$first, $second])->get();
		return $holidays;
	}
}