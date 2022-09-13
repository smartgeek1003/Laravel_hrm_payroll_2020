<?php

namespace App\Http\Controllers;

use App\ExpenceManagement;
use App\User;
use Illuminate\Http\Request;

use Auth;
use App\ExpPurpose;

class ExpenceManagementController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

        $expenses= ExpenceManagement::all()->where('created_by', Auth::user()->id);

		return view('administrator.hrm.expence.manage_expence', compact('expenses'));
	}

	public function expCategoryAdd(){

   return view('administrator.hrm.expence.expensePurposeAdd');

	}

	
	public function expCatStore(Request $request) {
		// return ($request->all());

		$expcats= new ExpPurpose;
		$expcats->created_by = Auth::user()->id;
		$expcats->exp_name = $request->exp_name;
		$expcats->save();

		if (!empty($expcats)) {

			return redirect('/hrm/expence/category/list')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/expence/category/list')->with('exception', 'Operation failed !');

	}

	public function expCategoryList(){
		$expcats= ExpPurpose::all()->where('created_by', Auth::user()->id);

   return view('administrator.hrm.expence.managePurposeExpense', ['expcats'=>$expcats]);

	}

	public function expCategoryEdit($id){
		$expcats= ExpPurpose::all()->where('id', $id);

   return view('administrator.hrm.expence.expensePurposeEdit', ['expcats'=>$expcats]);

	}

	public function expCatUpdate(Request $request) {
		// return ($request->all());
		$expcats= ExpPurpose::find($request->id);
		$expcats->exp_name = $request->exp_name;
		$expcats->save();

		if (!empty($expcats)) {

			return redirect('/hrm/expence/category/list')->with('message', 'Update successfully.');
		}
		return redirect('/hrm/expence/category/list')->with('exception', 'Operation failed !');

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$employees = User::whereBetween('access_label', [2, 3])
			->where('deletion_status', 0)
			->select('id', 'name')
			->orderBy('id', 'DESC')
			->get()
			->toArray();
		return view('administrator.hrm.expence.add_expence', compact('employees'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	

	public function store(Request $request) {

		$expenses= new ExpenceManagement;
		$expenses->created_by = Auth::user()->id;
		$expenses->purchased_date = $request->expense_date;
		$expenses->amount_spent = $request->exp_amount;
		$expenses->purchased_from = $request->cheque_no;
		$expenses->purchased_details = $request->particular;
		$expenses->employee_id = $request->employee_id;
		$expenses->item_name = $request->exp_purpose;
		$expenses->deletion_status = $request->deletion_status; 
		$expenses->save();

		
		
		if (!empty($expenses)) {
			return redirect('/hrm/expence/manage-expence')->with('message', 'Add successfully.');
		}
		return redirect('/hrm/expence/manage-expence')->with('exception', 'Operation failed !');

	}

	public function ExpensePayslip($id) {
		return view('administrator.hrm.expence.ExpensePayslip', compact('id'));

	}


	

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\ExpenceManagement  $expenceManagement
	 * @return \Illuminate\Http\Response
	 */
	public function show(ExpenceManagement $expenceManagement) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\ExpenceManagement  $expenceManagement
	 * @return \Illuminate\Http\Response
	 */
	public function edit(ExpenceManagement $expenceManagement) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\ExpenceManagement  $expenceManagement
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, ExpenceManagement $expenceManagement) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\ExpenceManagement  $expenceManagement
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(ExpenceManagement $expenceManagement) {
		//
	}
}
