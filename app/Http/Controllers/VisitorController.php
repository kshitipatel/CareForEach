<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitEntry;
use App\Models\Employee;
use Carbon\Carbon;

class VisitorController extends Controller
{
	public function index(Request $request)
	{
    	//sessioncheck
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();  
		if(($request->time)==NULL && ($request->employee)==NULL){
			$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
			return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
		}
		else{
			if(($request->time)!=NULL && ($request->employee)==NULL){
				if(($request->time)=='today'){
					$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereDate('date', Carbon::today())->get();
					return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
				}
				else{					
					$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereMonth('date',date('m'))->whereYear('date',date('Y'))->get();
					return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
				}
				
			}
			else{
				if(($request->time)==NULL && ($request->employee)!=NULL){
					$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('visit_entry.e_emailid',$request->employee)->get();
					return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
				}
				else{
					if(($request->time)=='today'){
						$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereDate('date', Carbon::today())->where('visit_entry.e_emailid',$request->employee)->get();
						return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
					}
					else{					
						$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereMonth('date',date('m'))->whereYear('date',date('Y'))->where('visit_entry.e_emailid',$request->employee)->get();
						return view('visitor.visitorList')->with(array('visitors'=> $visitors,'employees' => $employees,'cmp' => session()->get('key')));
					}
				}
			}
		}
	}

	public function vview($id)
	{
		$visitor = VisitEntry::find($id);
        return view('visitor.visitorDetails')->with(array('visitor'=> $visitor, 'cmp' => session()->get('key')));
	}
}
