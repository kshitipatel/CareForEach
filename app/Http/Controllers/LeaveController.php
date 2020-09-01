<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavereq;
use Session;

class LeaveController extends Controller
{
	public function index(Request $request)
	{
		if($request->status == NULL){
			$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename','employee.designation','employee.mobilenum','employee.photo')->get();
			return view('leave.leaveRequests')->with(array('leave_requests'=> $leave_requests, 'cmp' => session()->get('key')));
		}
		else{
			if($request->status == 'pending'){
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('leavereq.status',$request->status)->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename','employee.designation','employee.mobilenum','employee.photo')->get();
				return view('leave.leaveRequests')->with(array('leave_requests'=> $leave_requests, 'cmp' => session()->get('key')));
			}
			elseif($request->status == 'approved'){
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('leavereq.status','YES')->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename','employee.designation','employee.mobilenum','employee.photo')->get();
				return view('leave.leaveRequests')->with(array('leave_requests'=> $leave_requests, 'cmp' => session()->get('key')));
			}
			else{
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('leavereq.status','NO')->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename','employee.designation','employee.mobilenum','employee.photo')->get();
				return view('leave.leaveRequests')->with(array('leave_requests'=> $leave_requests, 'cmp' => session()->get('key')));
			}
		}
	}

	public function decision($id,$status)
	{
		$leave = Leavereq::find($id);
		if($status == 'YES'){
			$leave->status = $status;
			$leave->save();
			Session::flash('info','The leave has been accepted.');
			return redirect()->back();
		}
		else{
			$leave->status = $status;
			$leave->save();
			Session::flash('info','The leave has been rejected.');
			return redirect()->back();
		}
		

	}

}
