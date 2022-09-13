<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

header("Cache-Control: no-cache, must-revalidate");
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::group(['prefix' => 'setting', 'middleware' => 'auth', 'as' => 'setting.'], function () {
	Route::resource('role', 'RoleController');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', 'HomeController@index')->name('dashboard');

	//Export/Import//
	Route::get('/my/attendance', 'AttendanceController@myAttendance');
	Route::post('/my/attendance/view', 'AttendanceController@myAttendanceCSV');
	Route::post('/my/attendance/store', 'AttendanceController@myAttendanceCSVStore');
	Route::post('import-excel','ImportExcel\ImportExcelController@import');

	//Machine Activation//
    Route::get('/machine/activation', 'AttendanceController@machineActivation');
    Route::post('/machine/activation/update', 'AttendanceController@machineActivationUpdate');
    Route::get('/machine/manual/setting', 'AttendanceController@machineManualSetting');
    Route::get('/machine/manual/setting', 'AttendanceController@machineManualSetting');
    Route::get('/machine/attendance/manage', 'AttendanceController@attendanceManage');
    Route::get('/machine/attendance/report', 'AttendanceController@attendanceReport');
    Route::post('/machine/attendance/report/details', 'AttendanceController@attendanceReportDetails');
    Route::get('/machine/attendance/edit/{id}', 'AttendanceController@attendanceEdit');
    Route::post('/machine/attendance/update', 'AttendanceController@attendanceUpdate');




	// Leave Category Section //
	Route::get('/setting/leave_categories', 'LeaveCatController@index');
	Route::get('/setting/leave_categories/create', 'LeaveCatController@create');
	Route::post('/setting/leave_categories/store', 'LeaveCatController@store');
	Route::get('/setting/leave_categories/published/{id}', 'LeaveCatController@published');
	Route::get('/setting/leave_categories/unpublished/{id}', 'LeaveCatController@unpublished');
	Route::get('/setting/leave_categories/details/{id}', 'LeaveCatController@show');
	Route::get('/setting/leave_categories/edit/{id}', 'LeaveCatController@edit');
	Route::post('/setting/leave_categories/update/{id}', 'LeaveCatController@update');
	Route::get('/setting/leave_categories/delete/{id}', 'LeaveCatController@destroy');
	
	//Application Listes//
	Route::get('/hrm/application_lists', 'LeaveAppController@apllicationLists');
	Route::get('/hrm/leave_application/approved/{id}', 'LeaveAppController@approved');
	Route::get('/hrm/leave_application/not_approved/{id}', 'LeaveAppController@not_approved');
	Route::get('/hrm/application_lists/{id}', 'LeaveAppController@show');
	Route::get('/hrm/application/download/{id}', 'LeaveAppController@applicationDownload');

	//Leave Application//
	Route::get('/hrm/leave_application', 'LeaveAppController@index');
	Route::get('/hrm/leave_application/create', 'LeaveAppController@create');
	Route::post('/hrm/leave_application/store', 'LeaveAppController@store');
	Route::get('/hrm/leave_application/{id}', 'LeaveAppController@show');
	Route::get('/hrm/leave-reports', 'LeaveAppController@reports');
	Route::get('/hrm/leave-reports/pdf-reports', 'LeaveAppController@pdf_reports');

	//Noc and Ex Certificate Application//
	Route::get('/hrm/noc/add', 'LeaveAppController@nocAdd');
	Route::post('/hrm/noc/store', 'LeaveAppController@nocStore');
	Route::get('/hrm/noc/list', 'LeaveAppController@nocList');
	Route::get('/hrm/certificate/list', 'LeaveAppController@certificateList');

	Route::get('/hrm/noc/generate/{id}', 'LeaveAppController@nocGenerate');
	Route::get('/hrm/certificate/generate/{id}', 'LeaveAppController@certificateGenerate');
	
	

	// Designations Section //
	Route::get('/setting/designations', 'EmpDesignationController@index');
	Route::get('/setting/designations/create', 'EmpDesignationController@create');
	Route::post('/setting/designations/store', 'EmpDesignationController@store');
	Route::get('/setting/designations/published/{id}', 'EmpDesignationController@published');
	Route::get('/setting/designations/unpublished/{id}', 'EmpDesignationController@unpublished');
	Route::get('/setting/designations/details/{id}', 'EmpDesignationController@show');
	Route::get('/setting/designations/edit/{id}', 'EmpDesignationController@edit');
	Route::post('/setting/designations/update/{id}', 'EmpDesignationController@update');
	Route::get('/setting/designations/delete/{id}', 'EmpDesignationController@destroy');

	// Customer Section //
	Route::get('/people/clients', 'CustomerController@index');
	Route::get('/people/clients/print', 'CustomerController@print');
	Route::get('/people/clients/clients-pdf', 'CustomerController@clients_pdf');
	Route::get('/people/clients/create', 'CustomerController@create');
	Route::post('/people/clients/store', 'CustomerController@store');
	Route::get('/people/clients/active/{id}', 'CustomerController@active');
	Route::get('/people/clients/deactive/{id}', 'CustomerController@deactive');
	Route::get('/people/clients/details/{id}', 'CustomerController@show');
	Route::get('/people/clients/download-pdf/{id}', 'CustomerController@pdf');
	Route::get('/people/clients/edit/{id}', 'CustomerController@edit');
	Route::post('/people/clients/update/{id}', 'CustomerController@update');
	Route::get('/people/clients/delete/{id}', 'CustomerController@destroy');
	
	// Customer Types Section //
	Route::get('/setting/client-types', 'CustomerTypeController@index');
	Route::get('/setting/client-types/create', 'CustomerTypeController@create');
	Route::post('/setting/client-types/store', 'CustomerTypeController@store');
	Route::get('/setting/client-types/published/{id}', 'CustomerTypeController@published');
	Route::get('/setting/client-types/unpublished/{id}', 'CustomerTypeController@unpublished');
	Route::get('/setting/client-types/details/{id}', 'CustomerTypeController@show');
	Route::get('/setting/client-types/edit/{id}', 'CustomerTypeController@edit');
	Route::post('/setting/client-types/update/{id}', 'CustomerTypeController@update');
	Route::get('/setting/client-types/delete/{id}', 'CustomerTypeController@destroy');

	// Departments Section //
	Route::get('/setting/departments', 'EmplDepartmentController@index');
	Route::get('/setting/departments/create', 'EmplDepartmentController@create');
	Route::post('/setting/departments/store', 'EmplDepartmentController@store');
	Route::get('/setting/departments/published/{id}', 'EmplDepartmentController@published');
	Route::get('/setting/departments/unpublished/{id}', 'EmplDepartmentController@unpublished');
	Route::get('/setting/departments/details/{id}', 'EmplDepartmentController@show');
	Route::get('/setting/departments/edit/{id}', 'EmplDepartmentController@edit');
	Route::post('/setting/departments/update/{id}', 'EmplDepartmentController@update');
	Route::get('/setting/departments/delete/{id}', 'EmplDepartmentController@destroy');

	// Employee Reference Section //
	Route::get('/people/references', 'EmpReferenceController@index');
	Route::get('/people/references/print', 'EmpReferenceController@print');
	Route::get('/people/references/references-pdf', 'EmpReferenceController@references_pdf');
	Route::get('/people/references/create', 'EmpReferenceController@create');
	Route::post('/people/references/store', 'EmpReferenceController@store');
	Route::get('/people/references/active/{id}', 'EmpReferenceController@active');
	Route::get('/people/references/deactive/{id}', 'EmpReferenceController@deactive');
	Route::get('/people/references/details/{id}', 'EmpReferenceController@show');
	Route::get('/people/references/download-pdf/{id}', 'EmpReferenceController@pdf');
	Route::get('/people/references/edit/{id}', 'EmpReferenceController@edit');
	Route::post('/people/references/update/{id}', 'EmpReferenceController@update');
	Route::get('/people/references/delete/{id}', 'EmpReferenceController@destroy');

	// Employee Section //
	Route::get('/people/employees', 'EmplController@index');
	Route::get('/people/employees/print', 'EmplController@print');
	Route::get('/people/employees/create', 'EmplController@create');
	Route::post('/people/employees/store', 'EmplController@store');
	Route::get('/people/employees/active/{id}', 'EmplController@active');
	Route::get('/people/employees/deactive/{id}', 'EmplController@deactive');
	Route::get('/people/employees/details/{id}', 'EmplController@show');
	Route::get('/people/employees/download-pdf/{id}', 'EmplController@pdf');
	Route::get('/people/employees/edit/{id}', 'EmplController@edit');
	Route::post('/people/employees/update/{id}', 'EmplController@update');
	Route::get('/people/employees/delete/{id}', 'EmplController@destroy');

	// Folder Section //
	Route::get('/folders', 'FolderController@index');
	Route::get('/folders/create', 'FolderController@create');
	Route::post('/folders/store', 'FolderController@store');

	// File Section //
	Route::get('/files/{id}', 'FileController@index');
	Route::get('/files/create/{id}', 'FileController@create');
	Route::post('/files/store/{id}', 'FileController@store');
	Route::get('/files/download/{file}', 'FileController@download');

	// Profile Section
	Route::get('/profile/user-profile', 'ProfileController@index');
	Route::post('/profile/update-profile', 'ProfileController@update');
	Route::get('/profile/change-password', 'ProfileController@change_password');
	Route::post('/profile/update-password', 'ProfileController@update_password');

	//Custom Invoice
	Route::get('/custom-invoice', 'InvoiceController@index');
	Route::post('/make-invoice', 'InvoiceController@create');

	//SMS Section
	Route::get('/sms', 'SmsController@index');

	//////////////////////////// HRM ////////////////////////////

	//Attendance Section
	Route::get('/hrm/attendance/manage', 'AttendanceController@index');
	Route::post('/hrm/attendance/set', 'AttendanceController@set_attendance');
	Route::post('/hrm/attendance/store', 'AttendanceController@store');
	Route::post('/hrm/attendance/update', 'AttendanceController@update');
	Route::get('/hrm/attendance/report', 'AttendanceController@report');
	Route::post('/hrm/attendance/get-report', 'AttendanceController@get_report');
	Route::post('/hrm/attendance/time/set', 'AttendanceController@timeSet');
	Route::get('/hrm/attendance/details/{id}', 'AttendanceController@attDetails');
	Route::get('/hrm/attendance/details/report/go', 'AttendanceController@attDetailsReportGo');
	Route::get('/hrm/attendance/details/report/all', 'AttendanceController@attDetailsReport');
	Route::get('/hrm/attendance/details/report/pdf', 'AttendanceController@attDetailsReportPdf');


	// Payroll Section
	Route::get('/hrm/payroll', 'PayrollController@index');
	Route::post('/hrm/payroll/go', 'PayrollController@go');
	Route::get('/hrm/payroll/manage-salary/{id}', 'PayrollController@create');
	Route::post('/hrm/payroll/store', 'PayrollController@store');
	Route::get('/hrm/payroll/salary-list', 'PayrollController@list');
	Route::get('/hrm/payroll/details/{id}', 'PayrollController@show');
	Route::post('/hrm/payroll/update/{id}', 'PayrollController@update');

	//Increment//
	Route::get('/hrm/payroll/increment/search', 'IncrementController@newIncrementSearch');
	Route::post('/hrm/payroll/increment/store', 'IncrementController@newIncrementStore');
	Route::get('/hrm/payroll/increment/list', 'IncrementController@incrementList');

	//Salary Statement//
	Route::get('/hrm/salary/statement/search', 'IncrementController@salaryStatementSearch');
	Route::get('/hrm/salary/statement/view', 'IncrementController@salaryStatementView');
	Route::get('/hrm/salary/statement/preview', 'IncrementController@salaryStatementPreview');
	Route::get('/hrm/salary/statement/pdf', 'IncrementController@salaryStatementPdf');

	

	// Bonus Section //
	Route::get('/hrm/bonuses', 'BonusController@index');
	Route::get('/hrm/bonuses/create', 'BonusController@create');
	Route::post('/hrm/bonuses/store', 'BonusController@store');
	Route::get('/hrm/bonuses/details/{id}', 'BonusController@show');
	Route::get('/hrm/bonuses/edit/{id}', 'BonusController@edit');
	Route::post('/hrm/bonuses/update/{id}', 'BonusController@update');
	Route::get('/hrm/bonuses/delete/{id}', 'BonusController@destroy');

	// Deduction Section //
	Route::get('/hrm/deductions', 'DeductionController@index');
	Route::get('/hrm/deductions/create', 'DeductionController@create');
	Route::post('/hrm/deductions/store', 'DeductionController@store');
	Route::get('/hrm/deductions/details/{id}', 'DeductionController@show');
	Route::get('/hrm/deductions/edit/{id}', 'DeductionController@edit');
	Route::post('/hrm/deductions/update/{id}', 'DeductionController@update');
	Route::get('/hrm/deductions/delete/{id}', 'DeductionController@destroy');

	// Loan Section //
	Route::get('/hrm/loans', 'LoanController@index');
	Route::get('/hrm/loans/create', 'LoanController@create');
	Route::post('/hrm/loans/store', 'LoanController@store');
	Route::get('/hrm/loans/details/{id}', 'LoanController@show');
	Route::get('/hrm/loans/edit/{id}', 'LoanController@edit');
	Route::post('/hrm/loans/update/{id}', 'LoanController@update');
	Route::get('/hrm/loans/delete/{id}', 'LoanController@destroy');

	// Payment Section
	Route::get('/hrm/salary-payments', 'SalaryPaymentController@index');
	Route::post('/hrm/salary-payments/go', 'SalaryPaymentController@go');
	Route::get('/hrm/salary-payments/manage-salary/{id}/{salary_month}', 'SalaryPaymentController@create');
	Route::get('/hrm/salary-payments/pdf/{id}/{salary_month}', 'SalaryPaymentController@pdf');
	Route::post('/hrm/salary-payments/store', 'SalaryPaymentController@store');
	// Generate Payslip
	Route::get('/hrm/generate-payslips/', 'SalaryPaymentController@show');
	Route::post('/hrm/generate-payslips/', 'SalaryPaymentController@generate');
	Route::get('/hrm/generate-payslips/salary-list/{salary_month}', 'SalaryPaymentController@list');
	//
	Route::get('/hrm/provident-funds/', 'SalaryPaymentController@provident_fund');

	//Salary Sheet//
	Route::get('/hrm/salary/sheet/search', 'SalaryPaymentController@salarySheetSearch');
	Route::post('/hrm/salary/sheet/view', 'SalaryPaymentController@salarySheetView');

	// Noyon

	//working daya
	Route::get('/setting/working-days', 'WorkingDayController@index');
	Route::post('/setting/working-days/update/', 'WorkingDayController@update');

	//Holidays list
	Route::get('/setting/holidays', 'HolidayController@index');
	Route::get('/setting/holidays/create', 'HolidayController@create');
	Route::post('/setting/holidays/store', 'HolidayController@store');
	Route::get('/setting/holidays/published/{id}', 'HolidayController@published');
	Route::get('/setting/holidays/unpublished/{id}', 'HolidayController@unpublished');
	Route::get('/setting/holidays/details/{id}', 'HolidayController@show');
	Route::get('/setting/holidays/edit/{id}', 'HolidayController@edit');
	Route::post('/setting/holidays/update/{id}', 'HolidayController@update');
	Route::get('/setting/holidays/delete/{id}', 'HolidayController@destroy');

	// Personal Event Section //
	Route::get('/setting/personal-events', 'PersonalEventController@index');
	Route::get('/setting/personal-events/create', 'PersonalEventController@create');
	Route::post('/setting/personal-events/store', 'PersonalEventController@store');
	Route::get('/setting/personal-events/published/{id}', 'PersonalEventController@published');
	Route::get('/setting/personal-events/unpublished/{id}', 'PersonalEventController@unpublished');
	Route::get('/setting/personal-events/details/{id}', 'PersonalEventController@show');
	Route::get('/setting/personal-events/edit/{id}', 'PersonalEventController@edit');
	Route::post('/setting/personal-events/update/{id}', 'PersonalEventController@update');
	Route::get('/setting/personal-events/delete/{id}', 'PersonalEventController@destroy');

	//notice//
	Route::get('/hrm/notice', 'NoticeController@index');
	Route::get('/hrm/notice/create', 'NoticeController@create');
	Route::post('/hrm/notice/store', 'NoticeController@store');
	Route::get('/hrm/notice/published/{id}', 'NoticeController@published');
	Route::get('/hrm/notice/unpublished/{id}', 'NoticeController@unpublished');
	Route::get('/hrm/notice/delete/{id}', 'NoticeController@destroy');

	Route::get('/hrm/notice/show', 'NoticeController@show');

	

	//expence managements//
	Route::get('/hrm/expence/category/add', 'ExpenceManagementController@expCategoryAdd');
	Route::get('/hrm/expence/category/edit/{id}', 'ExpenceManagementController@expCategoryEdit');
	Route::post('/hrm/expence/category/update', 'ExpenceManagementController@expCatUpdate');

	Route::post('/hrm/expence/category/store', 'ExpenceManagementController@expCatStore');
	Route::get('/hrm/expence/category/list', 'ExpenceManagementController@expCategoryList');
	Route::get('/hrm/expence/manage-expence', 'ExpenceManagementController@index');
	Route::get('/hrm/expence/add-expence', 'ExpenceManagementController@create');
	Route::post('/hrm/expence/store', 'ExpenceManagementController@store');
	Route::get('/hrm/expence/payslip/{id}', 'ExpenceManagementController@ExpensePayslip');




	//employee award Category//
	Route::get('/setting/award_categories', 'AwardCategoryController@index');
	Route::get('/setting/award_categories/create', 'AwardCategoryController@create');
	Route::post('/setting/award_categories/store', 'AwardCategoryController@store');
	Route::get('/setting/award_categories/published/{id}', 'AwardCategoryController@published');
	Route::get('/setting/award_categories/unpublished/{id}', 'AwardCategoryController@unpublished');
	Route::get('/setting/award_categories/edit/{id}', 'AwardCategoryController@edit');
	Route::post('/setting/award_categories/update/{id}', 'AwardCategoryController@update');
	Route::get('/setting/award_categories/delete/{id}', 'AwardCategoryController@destroy');

	//employee awards//
	Route::get('/hrm/employee-awards', 'EmployeeAwardController@index');
	Route::get('/hrm/employee-awards/create', 'EmployeeAwardController@create');
	Route::post('/hrm/employee-awards/store', 'EmployeeAwardController@store');
	Route::get('/hrm/employee-awards/published/{id}', 'EmployeeAwardController@published');
	Route::get('/hrm/employee-awards/unpublished/{id}', 'EmployeeAwardController@unpublished');
	Route::get('/hrm/employee-awards/edit/{id}', 'EmployeeAwardController@edit');
	Route::post('/hrm/employee-awards/update/{id}', 'EmployeeAwardController@update');
	Route::get('/hrm/employee-awards/details/{id}', 'EmployeeAwardController@show');
	Route::get('/hrm/employee-awards/delete/{id}', 'EmployeeAwardController@destroy');



});


	Route::get('/clear', function() {
	    
    \Illuminate\Support\Facades\Artisan::call('optimize');
    \Illuminate\Support\Facades\Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('config:cache');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    return 'Cleared!';
});
