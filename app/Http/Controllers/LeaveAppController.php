<?php

namespace App\Http\Controllers;

use App\LeaveApplication;
use App\LeaveCategory;
use App\User;
use DB;
use PDF;
use App\Attendances;
use App\Noc;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveAppController extends Controller {

	public function reports(){
		$carbon = Carbon::now();
		$nowInDhakaTz = Carbon::now('Asia/Dhaka');
		$year = $nowInDhakaTz->format('Y');

		$users = User::query()
		->leftjoin('designations as designations', 'users.designation_id', 'designations.id')
		->whereBetween('users.access_label',array(2, 3))
		->where('users.deletion_status', 0)
		->orderBy('users.employee_id', 'asc')
		->get(['users.id', 'users.name', 'users.employee_id', 'designations.designation' ]);

		$attendances = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_attendances'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 1)
		->groupBy('attendances.user_id')
		->get();

		$absences = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_absences'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 0)
		->groupBy('attendances.user_id')
		->get();

		$casual_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_casual_leaves'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 1)
		->groupBy('attendances.user_id')
		->get();

		$earned_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_earned_leaves'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 2)
		->groupBy('attendances.user_id')
		->get();

		$advance_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_advance_leave'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 3)
		->groupBy('attendances.user_id')
		->get();

		$special_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_special_leave'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 4)
		->groupBy('attendances.user_id')
		->get();

		return view('administrator.hrm.leave_application.leave_report', compact('users', 'attendances', 'casual_leaves', 'earned_leaves', 'earned_leaves', 'advance_leaves', 'special_leaves', 'absences'));
	}

	public function pdf_reports(){
		$carbon = Carbon::now();
		$nowInDhakaTz = Carbon::now('Asia/Dhaka');
		$year = $nowInDhakaTz->format('Y');

		$users = User::query()
		->leftjoin('designations as designations', 'users.designation_id', 'designations.id')
		->whereBetween('users.access_label',array(2, 3))
		->where('users.deletion_status', 0)
		->orderBy('users.employee_id', 'asc')
		->get(['users.id', 'users.name', 'users.employee_id', 'designations.designation' ]);

		$attendances = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_attendances'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 1)
		->groupBy('attendances.user_id')
		->get();

		$absences = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_absences'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 0)
		->groupBy('attendances.user_id')
		->get();

		$casual_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_casual_leaves'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 1)
		->groupBy('attendances.user_id')
		->get();

		$earned_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_earned_leaves'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 2)
		->groupBy('attendances.user_id')
		->get();

		$advance_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_advance_leave'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 3)
		->groupBy('attendances.user_id')
		->get();

		$special_leaves = DB::table('attendances')
		->select(DB::raw('count(attendances.attendance_status) AS total_special_leave'), 'attendances.user_id')
		->whereYear('attendances.attendance_date', $year)
		->where('attendance_status', 0)
		->where('leave_category_id', 4)
		->groupBy('attendances.user_id')
		->get();

		$pdf = PDF::loadView('administrator.hrm.leave_application.pdf_reports', compact('users', 'attendances', 'casual_leaves', 'earned_leaves', 'earned_leaves', 'advance_leaves', 'special_leaves', 'absences'));
		$file_name = 'attendance_report.pdf';
		return $pdf->download($file_name);
	}

	public function index() {
		$leave_applications = LeaveApplication::query()
		->leftjoin('users as users', 'users.id', '=', 'leave_applications.created_by')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leave_applications.leave_category_id')
		->orderBy('leave_applications.id', 'DESC')
		->where('leave_applications.deletion_status', 0)
		->get([
			'leave_applications.*',
			'users.name',
			'leave_categories.leave_category',
		])
		->toArray();

		return view('administrator.hrm.leave_application.manage_application', compact('leave_applications'));
	}

	public function apllicationLists() {
		$leave_applications = LeaveApplication::query()
		->leftjoin('users as users', 'users.id', '=', 'leave_applications.created_by')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leave_applications.leave_category_id')
		->orderBy('leave_applications.id', 'DESC')
		->where('leave_applications.deletion_status', 0)
		->get([
			'leave_applications.*',
			'users.name',
			'leave_categories.leave_category',
		])
		->toArray();
		return view('administrator.hrm.leave_application.manage_application_lists', compact('leave_applications'));

	}

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function applicationDownload($id) {
		return view('administrator.hrm.leave_application.applicationDownload', compact('id'));
	}



	   /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function nocAdd() {
		return view('administrator.hrm.noc.nocAdd');
	}



	   /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function nocStore(Request $request) {

		//return $request;
        if($request->details==NULL or $request->bottom==NULL){
        	return redirect('hrm/noc/add')->with('exception', 'Ohps! please fill up the required!');
        }else{
		$nocs= new Noc;
		$nocs->empid=$request->empid;
		$nocs->category=$request->category;
		$nocs->details=$request->details;
		$nocs->bottom=$request->bottom;
		$nocs->save();

		return redirect('hrm/noc/add')->with('message', 'Save Successfully!');

		}

	}

	  /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function nocList() {
		return view('administrator.hrm.noc.nocList');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function nocGenerate($id) {
		return view('administrator.hrm.noc.nocGenerate', compact('id'));
	}


	  /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function certificateList() {
		return view('administrator.hrm.noc.certificateList');
	}

	

/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function certificateGenerate($id) {
		return view('administrator.hrm.noc.certificateGenerate', compact('id'));
	}





	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$leave_categorys = LeaveCategory::where('deletion_status', 0)
		->where('publication_status', 1)
		->select('id', 'leave_category')
		->get();
		// dd($leave_categorys);
		return view('administrator.hrm.leave_application.add_leave_application', compact('leave_categorys'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//return $request->all();
		$leave_application = $this->validate($request, [
			'leave_category_id' => 'required',
			'start_date' => 'required',
			'end_date' => 'required',
		]);

		
		$days = Carbon::parse(request('start_date'))->diffInDays(Carbon::parse(request('end_date')));


		$result = LeaveApplication::create($leave_application +['last_leave_date' =>request('last_leave_date')] +['last_leave_period' =>request('last_leave_period')] +['last_leave_category_id' =>request('last_leave_category_id')] +['leave_address' =>request('leave_address')] +['during_leave' =>request('during_leave')] +['reason' =>request('reason')] + ['created_by' => auth()->user()->id]);
		$inserted_id = $result->id;

		if (!empty($inserted_id)) {
			return redirect('/hrm/leave_application/create')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/leave_application/create')->with('exception', 'Operation failed !');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$leave_application = LeaveApplication::query()
		->leftjoin('users as users', 'users.id', '=', 'leave_applications.created_by')
		->leftjoin('designations as designations', 'users.designation_id', '=', 'designations.id')
		->leftjoin('leave_categories as leave_categories', 'leave_categories.id', '=', 'leave_applications.leave_category_id')
		->orderBy('leave_applications.id', 'DESC')
		->where('leave_applications.id', $id)
		->where('leave_applications.deletion_status', 0)
		->first([
			'leave_applications.*',
			'users.name',
			'users.employee_id',
			'designations.designation',
			'leave_categories.leave_category',
		])
		->toArray();
		return view('administrator.hrm.leave_application.show_leave_application', compact('leave_application'));
	}

	public function approved($id) {
		$affected_row = LeaveApplication::where('id', $id)
		->update(['publication_status' => 1]);

		if (!empty($affected_row)) {
			return redirect('/hrm/application_lists/')->with('message', 'Accepted successfully.');
		}
		return redirect('/hrm/application_lists/')->with('exception', 'Operation failed !');
	}

	public function not_approved($id) {
		$affected_row = LeaveApplication::where('id', $id)
		->update(['publication_status' => 2]);

		if (!empty($affected_row)) {
			return redirect('/hrm/application_lists/')->with('message', 'Not Accepted.');
		}
		return redirect('/hrm/application_lists/')->with('exception', 'Operation failed !');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function edit(LeaveApplication $leaveApplication) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, LeaveApplication $leaveApplication) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\LeaveApplication  $leaveApplication
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(LeaveApplication $leaveApplication) {
		//
	}

}
