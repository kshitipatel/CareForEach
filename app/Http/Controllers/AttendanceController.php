<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;

class AttendanceController extends Controller
{
	public function index(Request $request)
	{
		$c_date = Carbon::today();
		if(($request->cdate)==NULL){
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereDate('date', $c_date)->get();
    		//dd($attendance);
			return view('attendance.attendance')->with(array('attendance'=> $attendance,  'cdate' => $c_date, 'cmp' => session()->get('key')));
		}
		else{
			$c_date = $request->cdate;
			//echo $c_date;
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereDate('date', $c_date)->get();
    		//dd($attendance);
			return view('attendance.attendance')->with(array('attendance'=> $attendance,  'cdate' => $c_date, 'cmp' => session()->get('key')));
		}
		

	}
	
}
