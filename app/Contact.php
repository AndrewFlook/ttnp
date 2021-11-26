<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $dates = [
		'created_at',
		'updated_at'
	];

    protected $fillable = [
		'name',
		'desc',
		'street',
		'city',
		'state',
		'zip',
		'phone',
		'email',
		'manager'
	];
}
