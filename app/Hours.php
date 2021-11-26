<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Hours extends Model
{
    protected $dates = [
		'created_at',
		'updated_at'
	];

	protected $fillable = [
		'day',
		'open',
		'close',
		'hh_today',
		'hh_start',
		'hh_end',
		'ls_start',
		'ls_end',
	];
}
