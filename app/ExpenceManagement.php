<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenceManagement extends Model {

	protected $fillable = [
		'created_by', 'employee_id', 'item_name', 'purchased_from', 'purchased_date', 'amount_spent', 'purchased_details', 'deletion_status', 
	];
}
