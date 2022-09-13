<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpPurpose extends Model
{
   protected $fillable = [
		'exp_name', 'created_by',
	];
}
