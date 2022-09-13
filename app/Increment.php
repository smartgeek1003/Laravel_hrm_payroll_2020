<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    protected $fillable = [
		'created_by', 'emp_id', 'amount', 'date', 'incr_purpose', 
	];
}
