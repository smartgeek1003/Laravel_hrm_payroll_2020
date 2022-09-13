<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveApplication extends Model {
	protected $fillable = [
		'created_by', 'leave_category_id', 'start_date', 'end_date','last_leave_date', 'last_leave_period', 'last_leave_category_id', 'leave_address', 'during_leave', 'reason', 'publication_status', 'deletion_status',
	];
}
