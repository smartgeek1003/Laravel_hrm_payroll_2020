<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SetTime extends Model
{
    protected $fillable = [
		'created_by', 'in_time', 'time_time',
	];
}
