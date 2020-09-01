<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\VisitEntry;
use App\Models\Ordermaster;
use App\Models\Orderdetails;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Complaint;
use App\Models\Wishlist;
use App\Models\WishlistCust;
use App\Models\Leavereq;
use Carbon\Carbon;
use Session;
use Excel;

class ReportController extends Controller
{
	public function index(Request $request)
	{
		$reports = ['Attendance', 'Visitor', 'Collection', 'Stock', 'Complaint', 'Sales', 'Customer', 'Ginnie Box', 'Leave', 'Location', 'Pending Collection', 'Purchase'];
		return view('report.reportList')->with(array('reports'=> $reports, 'cmp' => session()->get('key')));
	}

	public function show(Request $request, $name)
	{
		if($name == 'Attendance'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
				return view('report.attendanceReport')->with(array('attendance'=> $attendance, 'employees'=> $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->cdate1, 'cdate2' => $request->cdate2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('attendance.e_emailid',$request->emailid)->get();
				return view('report.attendanceReport')->with(array('attendance'=> $attendance, 'employees'=> $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->cdate1, 'cdate2' => $request->cdate2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$c_date1, $c_date2])->get();
				return view('report.attendanceReport')->with(array('attendance'=> $attendance, 'employees'=> $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$e = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->where('eid',$request->emailid)->select('ename')->get();
				$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('attendance.e_emailid',$request->emailid)->whereBetween('date', [$c_date1, $c_date2])->get();
				return view('report.attendanceReport')->with(array('attendance'=> $attendance, 'employees'=> $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Visitor'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();  
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
				return view('report.visitorReport')->with(array('visitors'=> $visitors,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$request->c_date1, $request->c_date2])->get();
				return view('report.visitorReport')->with(array('visitors'=> $visitors,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){

				$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('employee.e_emailid',$request->emailid)->get();
				return view('report.visitorReport')->with(array('visitors'=> $visitors,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$c_date1, $c_date2])->where('employee.eid',$request->emailid)->get();
				return view('report.visitorReport')->with(array('visitors'=> $visitors,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Collection'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();  
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
				return view('report.collectionReport')->with(array('collection'=> $collection,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('payment.date', [$c_date1, $c_date2])->get();
				return view('report.collectionReport')->with(array('collection'=> $collection,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$request->emailid)->get();
				return view('report.collectionReport')->with(array('collection'=> $collection,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('payment.date', [$c_date1, $c_date2])->where('ordermaster.e_emailid',$request->emailid)->get();
				return view('report.collectionReport')->with(array('collection'=> $collection,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Sales'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
				return view('report.salesReport')->with(array('sales'=> $sales,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('ordermaster.date', [$c_date1, $c_date2])->orderBy('ordermaster.date', 'desc')->get();
				return view('report.salesReport')->with(array('sales'=> $sales,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$request->emailid)->orderBy('ordermaster.date', 'desc')->get();
				return view('report.salesReport')->with(array('sales'=> $sales,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('ordermaster.date', [$c_date1, $c_date2])->where('ordermaster.e_emailid',$request->emailid)->orderBy('ordermaster.date', 'desc')->get();
				return view('report.salesReport')->with(array('sales'=> $sales,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Complaint'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('complaint.date', 'desc')->get();
				return view('report.complaintReport')->with(array('complaints'=> $complaints,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$c_date1, $c_date2])->orderBy('complaint.date', 'desc')->get();
				return view('report.complaintReport')->with(array('complaints'=> $complaints,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('complaint.e_emailid',$request->emailid)->orderBy('complaint.date', 'desc')->get();
				return view('report.complaintReport')->with(array('complaints'=> $complaints,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$c_date1, $c_date2])->where('complaint.e_emailid',$request->emailid)->orderBy('complaint.date', 'desc')->get();
				return view('report.complaintReport')->with(array('complaints'=> $complaints,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Ginnie Box'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$wishlist = Wishlist::join('wishlist_cust','wishlist_cust.wcid','wishlist.wcid')->join('employee','wishlist.e_emailid','=','employee.e_emailid')->join('product','product.pid','=','wishlist.pid')->where('wishlist.c_emailid',session()->get('key'))->orderBy('wishlist.date', 'desc')->get();
				return view('report.ginnieBoxReport')->with(array('wishlist'=> $wishlist,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$wishlist = Wishlist::join('wishlist_cust','wishlist_cust.wcid','wishlist.wcid')->join('employee','wishlist.e_emailid','=','employee.e_emailid')->join('product','product.pid','=','wishlist.pid')->where('wishlist.c_emailid',session()->get('key'))->whereBetween('wishlist.date', [$c_date1, $c_date2])->orderBy('wishlist.date', 'desc')->get();
				return view('report.ginnieBoxReport')->with(array('wishlist'=> $wishlist,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$wishlist = Wishlist::join('wishlist_cust','wishlist_cust.wcid','wishlist.wcid')->join('employee','wishlist.e_emailid','=','employee.e_emailid')->join('product','product.pid','=','wishlist.pid')->where('wishlist.c_emailid',session()->get('key'))->where('wishlist.e_emailid',$request->emailid)->orderBy('wishlist.date', 'desc')->get();
				return view('report.ginnieBoxReport')->with(array('wishlist'=> $wishlist,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$wishlist = Wishlist::join('wishlist_cust','wishlist_cust.wcid','wishlist.wcid')->join('employee','wishlist.e_emailid','=','employee.e_emailid')->join('product','product.pid','=','wishlist.pid')->where('wishlist.c_emailid',session()->get('key'))->whereBetween('wishlist.date', [$c_date1, $c_date2])->where('wishlist.e_emailid',$request->emailid)->orderBy('wishlist.date', 'desc')->get();
				return view('report.ginnieBoxReport')->with(array('wishlist'=> $wishlist,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Leave'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
				return view('report.leaveReport')->with(array('leave_requests'=> $leave_requests,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('leavereq.requestdate', [$c_date1, $c_date2])->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();	
				return view('report.leaveReport')->with(array('leave_requests'=> $leave_requests,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('leavereq.e_emailid',$request->emailid)->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
				return view('report.leaveReport')->with(array('leave_requests'=> $leave_requests,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2, 'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('leavereq.requestdate', [$c_date1, $c_date2])->where('leavereq.e_emailid',$request->emailid)->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
				return view('report.leaveReport')->with(array('leave_requests'=> $leave_requests,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $c_date1, 'cdate2' => $c_date2, 'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Customer'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
				return view('report.customerReport')->with(array('customers'=> $customers,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;	
				$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('customer.date', [$c_date1, $c_date2])->get();
				return view('report.customerReport')->with(array('customers'=> $customers,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('customer.e_emailid',$request->emailid)->get();
				return view('report.customerReport')->with(array('customers'=> $customers,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('customer.date', [$c_date1, $c_date2])->where('customer.e_emailid',$request->emailid)->get();
				return view('report.customerReport')->with(array('customers'=> $customers,'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Pending Collection'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			if(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)==NULL){
				$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
				$remind = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
				return view('report.pendingCollectionReport')->with(array('pending_collection'=> $pending_collection, 'remind' => $remind, 'employees' => $employees, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)!=NULL && ($request->cdate2)!=NULL && ($request->emailid)==NULL){	
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('date', [$c_date1, $c_date2])->orderBy('ordermaster.date', 'desc')->get();	
				$remind = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
				return view('report.pendingCollectionReport')->with(array('pending_collection'=> $pending_collection,'employees' => $employees,'remind' => $remind, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			elseif(($request->cdate1)==NULL && ($request->cdate2)==NULL && ($request->emailid)!=NULL){
				$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$request->emailid)->orderBy('ordermaster.date', 'desc')->get();	
				$remind = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
				return view('report.pendingCollectionReport')->with(array('pending_collection'=> $pending_collection,'employees' => $employees,'remind' => $remind, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
			else{
				$c_date1 = $request->cdate1;
				$c_date2 = $request->cdate2;
				$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.ue_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('date', [$c_date1, $c_date2])->where('ordermaster.e_emailid',$request->emailid)->orderBy('ordermaster.date', 'desc')->get();
				$remind = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();	
				return view('report.pendingCollectionReport')->with(array('pending_collection'=> $pending_collection,'employees' => $employees,'remind' => $remind, 'alreadyselected' => $request->emailid, 'cdate1' => $request->c_date1, 'cdate2' => $request->c_date2,'cmp' => session()->get('key')));
			}
		}

		elseif($name == 'Stock'){
			$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
			$subcategories = Subcategory::where('c_emailid',session()->get('key'))->get();
			$product = Product::where('c_emailid',session()->get('key'))->get();
			$categories = Category::where('c_emailid',session()->get('key'))->get();
			if(($request->subcategory)==NULL && ($request->category)==NULL && ($request->product)==NULL){
				$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.c_emailid',session()->get('key'))->get();
				return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => NULL, 'category' =>NULL, 'subcategory' => NULL, 'cmp' => session()->get('key')));
			}
			elseif(($request->subcategory)==NULL && ($request->category)==NULL && ($request->product)!=NULL){	
				$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.pid',$request->product)->where('product.c_emailid',session()->get('key'))->get();
				return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => $request->product, 'category' =>NULL, 'subcategory' => NULL, 'cmp' => session()->get('key')));
			}
			elseif(($request->subcategory)==NULL && ($request->category)!=NULL && ($request->product)==NULL){	
				$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('subcategory.catid',$request->category)->where('product.c_emailid',session()->get('key'))->get();
				return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => NULL, 'category' =>NULL, 'subcategory' => $request->subcategory, 'cmp' => session()->get('key')));
			}
			elseif(($request->subcategory)!=NULL && ($request->category)==NULL && ($request->product)==NULL){	
				$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$request->subcategory)->where('product.c_emailid',session()->get('key'))->get();
				return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => NULL, 'category' =>$request->category, 'subcategory' => NULL, 'cmp' => session()->get('key')));
			}
			elseif(($request->subcategory)!=NULL && ($request->category)!=NULL && ($request->product)==NULL){
				$flag = 0;
				foreach ($subcategories as $subcat) {
					if($request->subcategory == $subcat->subcatid){
						if($request->category == $subcat->catid){
							$flag += 1;
						}
					}
				}
				if($flag != 0 )
				{
					$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$request->subcategory)->where('subcategory.catid',$request->category)->where('product.c_emailid',session()->get('key'))->get();
					return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => NULL, 'category' =>$request->category, 'subcategory' => $request->subcategory, 'cmp' => session()->get('key')));
				}
				else{
					Session::flash('error','You selected wrong combination of category and subcategory.');
					return redirect()->back();
				}
				
			}
			else{
				$flag = 0;
				foreach ($subcategories as $subcat) {
					if($request->subcategory == $subcat->subcatid){
						if($request->category == $subcat->catid){
							foreach ($product as $p) {
								if($p->pid == $request->product){
									if($p->subcatid == $request->subcategory){
										$flag += 1;
									}
								}
							}							
						}
					}
				}
				if($flag != 0 )
				{
					$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$request->subcategory)->where('subcategory.catid',$request->category)->where('product.pid',$request->product)->where('product.c_emailid',session()->get('key'))->get();
					return view('report.productReport')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectproduct'=>$product,'alreadyselected' => $request->product, 'category' =>$request->category, 'subcategory' => $request->subcategory, 'cmp' => session()->get('key')));
				}
				else{
					Session::flash('error','You selected wrong combination of category, subcategory and product.');
					return redirect()->back();
				}
			}
		}

		else{
			echo "hello";
		}
	}

}

