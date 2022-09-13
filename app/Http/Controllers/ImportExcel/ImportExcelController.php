<?php

namespace App\Http\Controllers\ImportExcel;

use App\Contact;
use App\Imports\ImportContacts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{

    public function import(Request $request){
        $request->validate([
            'import_file'=>'required'
        ]);
       Excel::import(new ImportContacts,request()->file('import_file'));
       return back()->with('message','XL File Import Successfully!');

    }
}
