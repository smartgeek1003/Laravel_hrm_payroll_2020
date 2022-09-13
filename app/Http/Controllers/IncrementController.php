<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Increment;
use App\User;
use App\Payroll;
use App\SalaryPayment;
use DB;
use PDF;
class IncrementController extends Controller
{
public function newIncrementSearch(){
	$employees = User::whereBetween('access_label', [2, 3])
			->where('deletion_status', 0)
			->select('id', 'name')
			->orderBy('id', 'DESC')
			->get()
			->toArray();
	return view('administrator.hrm.increment.newIncrementSearch', compact('employees'));
}
public function newIncrementStore(Request $request){
		$oldbasics = Payroll::all()->where('user_id', $request->emp_id);
foreach($oldbasics as $oldbasic){
	$parollid=$oldbasic->id;
	$prevbasic=$oldbasic->basic_salary;
}
		
		if($request->emp_id=="" or $request->amount==""){
		return redirect('hrm/payroll/increment/search')->with('exception', 'Select Employee and Enter Amount !');
}else{

		$increments = new Increment;
		$increments->emp_id=$request->emp_id;
		$increments->date=$request->date;
		$increments->created_by=Auth::user()->id;
		$increments->amount=$request->amount;
		$increments->incr_purpose=$request->incr_purpose;
		$increments->save();
		$payrolls = Payroll::find($parollid);
		$payrolls->basic_salary=$prevbasic+$request->amount;
		$payrolls->save();
		
		return redirect('/hrm/payroll/increment/list')->with('message', 'Increment Added Successful!');;
		}
}
public function incrementList(){
	$increments= Increment::all()->where('created_by', Auth::user()->id);
	return view('administrator.hrm.increment.incrementList', compact('increments'));
}
public function salaryStatementSearch(){
	$employees = SalaryPayment::all();
return view('administrator.hrm.increment.salaryStatementSearch', compact('employees'));
}
public function salaryStatementView(Request $request){
	$empid= $request->emp_id;
	$daterange= $request->daterange;
	if($request->daterange=='' or $empid==''){
	return redirect('/hrm/salary/statement/search')->with('exception', 'Please select the Date Range');
	}else{
	$dates = explode(' - ', $request->daterange);
	$date1 = $dates[0];
	$date2 = $dates[1];

$startdate = date("Y-m-d", strtotime($date1));
$enddate = date("Y-m-d", strtotime($date2));
	
$salarysheets= DB::table('salary_payments')->whereBetween('payment_month', [$startdate, $enddate])
	->where('user_id', $empid)
	->get();
	$datetotal= DB::table('salary_payments')->whereBetween('payment_month', [$startdate, $enddate])
	->where('user_id', $empid)->sum('gross_salary');
	return view('administrator.hrm.increment.salaryStatementView', compact('salarysheets', 'startdate', 'enddate', 'datetotal', 'empid'));
}
}
public function salaryStatementPreview(Request $request){
$empid= $request->emp_id;
$startdate= $request->date1;
$enddate= $request->date2;
	if($empid=='' or $startdate='' or $enddate=''){
	return redirect('/hrm/salary/statement/search')->with('exception', 'Please select the Date Range');
	}else{
	$startdate= $request->date1;
$enddate= $request->date2;
	
$salarystats= DB::table('salary_payments')->whereBetween('payment_month', [$request->date1, $request->date2])
	->where('user_id', $empid)
	->get();
	$datetotal= DB::table('salary_payments')->whereBetween('payment_month', [$request->date1, $request->date2])
	->where('user_id', $empid)->sum('gross_salary');
	return view('administrator.hrm.increment.salaryStatementPreview', compact('salarystats', 'startdate', 'enddate', 'datetotal', 'empid'));
}
}
public function salaryStatementPdf(Request $request){
	
$empid= $request->emp_id;
$startdate= $request->date1;
$enddate= $request->date2;
	if($empid=='' or $startdate='' or $enddate=''){
	return redirect('/hrm/salary/statement/search')->with('exception', 'Please select the Date Range');
	}else{
	$startdate= $request->date1;
$enddate= $request->date2;
	
$salarystats= DB::table('salary_payments')->whereBetween('payment_month', [$request->date1, $request->date2])
	->where('user_id', $empid)
	->get();
	$datetotal= DB::table('salary_payments')->whereBetween('payment_month', [$request->date1, $request->date2])
	->where('user_id', $empid)->sum('gross_salary');
	
$pdf = PDF::loadView('administrator.hrm.increment.salaryStatementPdf', compact('salarystats', 'startdate', 'enddate', 'datetotal', 'empid'));
		$file_name = 'Salary-Statement.pdf';
		return $pdf->download($file_name);
}
}

}