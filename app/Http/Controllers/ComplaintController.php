<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
	public function index()
    {
    	$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('complaint.date', 'desc')->get();
    	return view('complaints.allComplaints')->with(array('complaints'=> $complaints, 'cmp' => session()->get('key')));   
    }
}
