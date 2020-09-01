<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Employee;
use App\Models\Company;
use Carbon\Carbon;
use Session;

class MessageController extends Controller
{
	public function index(Request $request){
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get(); 
		if($request->employee == NULL){
			$inbox = Message::join('employee','employee.e_emailid','message.e_emailid')->where('message.c_emailid',session()->get('key'))->where('sender','!=',session()->get('key'))->get();   
			return view('message.inbox')->with(array('inbox'=> $inbox, 'employees'=> $employees, 'cmp' => session()->get('key')));
		} 
		else{
			$inbox = Message::join('employee','employee.e_emailid','message.e_emailid')->where('message.c_emailid',session()->get('key'))->where('sender','!=',session()->get('key'))->where('employee.eid',$request->employee)->get();   
			return view('message.inbox')->with(array('inbox'=> $inbox, 'employees'=> $employees, 'cmp' => session()->get('key')));
		}

	}

	public function chat($id){
		$employee = Employee::find($id);
		$company = Company::where('c_emailid',session()->get('key'))->first();
		$chat = Message::where('message.c_emailid',session()->get('key'))->where('message.e_emailid',$employee->e_emailid)->orderBy('datetime','desc')->orderBy('time','desc')->get();
		return view('message.chat')->with(array('chat'=> $chat, 'employee' => $employee,'company' => $company, 'cmp' => session()->get('key')));
	}

	public function send(Request $request,$employee){
		$message = $request->msg;
		$sendmeassage = new Message;
		$sendmeassage->datetime = Carbon::today();
		$sendmeassage->time = Carbon::now();
		$sendmeassage->e_emailid = $employee;
		$sendmeassage->c_emailid = session()->get('key');
		$sendmeassage->text = $message;
		$sendmeassage->sender = session()->get('key');
		$sendmeassage->save();
		return redirect()->back();

	}
}
