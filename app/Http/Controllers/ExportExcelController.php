<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use App\Models\Attendance;
use App\Models\Employee;
use App\Models\VisitEntry;
use App\Models\Ordermaster;
use App\Models\Orderdetails;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Complaint;
use App\Models\Wishlist;
use App\Models\WishlistCust;
use App\Models\Leavereq;

class ExportExcelController extends Controller
{
	public function attexport($emailid,$cdate1,$cdate2)
	{
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
			$attendance_array[] = array('attid', 'logintime', 'logouttime', 'date', 'e_emailid','long_login','late_login','long_logout','late_logout','location','location_logout');
			foreach($attendance as $ad)
			{
				$attendance_array[] = array(
					'attid' => $ad->attid,
					'logintime' => $ad->logintime,
					'logouttime' => $ad->logouttime,
					'date' => $ad->date,
					'e_emailid' => $ad->e_emailid,
					'long_login' => $ad->long_login,
					'late_login' => $ad->late_login,
					'long_logout' => $ad->long_logout,
					'late_logout' => $ad->late_logout,
					'location' => $ad->location,
					'location_logout' => $ad->location_logout
				);
			}
			Excel::create('Attendance Data', function($excel) use ($attendance_array){
				$excel->setTitle('Attendance Data');
				$excel->sheet('Attendance Data', function($sheet) use ($attendance_array){
					$sheet->fromArray($attendance_array, null, 'A1', false, false);
				});
			})->download('xlsx');
			
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('attendance.e_emailid',$emailid)->get();
			$attendance_array[] = array('attid', 'logintime', 'logouttime', 'date', 'e_emailid','long_login','late_login','long_logout','late_logout','location','location_logout');
			foreach($attendance as $ad)
			{
				$attendance_array[] = array(
					'attid' => $ad->attid,
					'logintime' => $ad->logintime,
					'logouttime' => $ad->logouttime,
					'date' => $ad->date,
					'e_emailid' => $ad->e_emailid,
					'long_login' => $ad->long_login,
					'late_login' => $ad->late_login,
					'long_logout' => $ad->long_logout,
					'late_logout' => $ad->late_logout,
					'location' => $ad->location,
					'location_logout' => $ad->location_logout
				);
			}
			Excel::create('Attendance Data', function($excel) use ($attendance_array){
				$excel->setTitle('Attendance Data');
				$excel->sheet('Attendance Data', function($sheet) use ($attendance_array){
					$sheet->fromArray($attendance_array, null, 'A1', false, false);
				});
			})->download('xlsx');
			
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($id)=="no"){
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$cdate1, $cdate2])->get();
			$attendance_array[] = array('attid', 'logintime', 'logouttime', 'date', 'e_emailid','long_login','late_login','long_logout','late_logout','location','location_logout');
			foreach($attendance as $ad)
			{
				$attendance_array[] = array(
					'attid' => $ad->attid,
					'logintime' => $ad->logintime,
					'logouttime' => $ad->logouttime,
					'date' => $ad->date,
					'e_emailid' => $ad->e_emailid,
					'long_login' => $ad->long_login,
					'late_login' => $ad->late_login,
					'long_logout' => $ad->long_logout,
					'late_logout' => $ad->late_logout,
					'location' => $ad->location,
					'location_logout' => $ad->location_logout
				);
			}
			Excel::create('Attendance Data', function($excel) use ($attendance_array){
				$excel->setTitle('Attendance Data');
				$excel->sheet('Attendance Data', function($sheet) use ($attendance_array){
					$sheet->fromArray($attendance_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$e = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->where('eid',$id)->select('ename')->get();
			$attendance = Attendance::join('employee','attendance.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('attendance.e_emailid',$request->emailid)->whereBetween('date', [$c_date1, $c_date2])->get();
			$attendance_array[] = array('attid', 'logintime', 'logouttime', 'date', 'e_emailid','long_login','late_login','long_logout','late_logout','location','location_logout');
			foreach($attendance as $ad)
			{
				$attendance_array[] = array(
					'attid' => $ad->attid,
					'logintime' => $ad->logintime,
					'logouttime' => $ad->logouttime,
					'date' => $ad->date,
					'e_emailid' => $ad->e_emailid,
					'long_login' => $ad->long_login,
					'late_login' => $ad->late_login,
					'long_logout' => $ad->long_logout,
					'late_logout' => $ad->late_logout,
					'location' => $ad->location,
					'location_logout' => $ad->location_logout
				);
			}
			Excel::create('Attendance Data', function($excel) use ($attendance_array){
				$excel->setTitle('Attendance Data');
				$excel->sheet('Attendance Data', function($sheet) use ($attendance_array){
					$sheet->fromArray($attendance_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function visitexport($emailid,$cdate1,$cdate2)
	{
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
			$visitors_array[] = array('veid', 'e_emailid', 'date', 'visitername', 'companyname', 'area', 'vaddress', 'vdiscussion', 'vtime', 'vcontactnum', 'visiter_emailid');
			foreach($visitors as $visit)
			{
				$visitors_array[] = array(
					'veid' => $visit->veid,
					'e_emailid' => $visit->e_emailid,
					'date' => $visit->date,
					'visitername' => $visit->visitername,
					'companyname' => $visit->companyname,
					'area' => $visit->area,
					'vaddress' => $visit->vaddress,
					'vdiscussion' => $visit->vdiscussion,
					'vtime' => $visit->vtime,
					'vcontactnum' => $visit->vcontactnum,
					'visiter_emailid' => $visit->visiter_emailid
				);
			}
			Excel::create('Visitors Data', function($excel) use ($visitors_array){
				$excel->setTitle('Visitors Data');
				$excel->sheet('Visitors Data', function($sheet) use ($visitors_array){
					$sheet->fromArray($visitors_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$cdate1, $cdate2])->get();
			$visitors_array[] = array('veid', 'e_emailid', 'date', 'visitername', 'companyname', 'area', 'vaddress', 'vdiscussion', 'vtime', 'vcontactnum', 'visiter_emailid');
			foreach($visitors as $visit)
			{
				$visitors_array[] = array(
					'veid' => $visit->veid,
					'e_emailid' => $visit->e_emailid,
					'date' => $visit->date,
					'visitername' => $visit->visitername,
					'companyname' => $visit->companyname,
					'area' => $visit->area,
					'vaddress' => $visit->vaddress,
					'vdiscussion' => $visit->vdiscussion,
					'vtime' => $visit->vtime,
					'vcontactnum' => $visit->vcontactnum,
					'visiter_emailid' => $visit->visiter_emailid
				);
			}
			Excel::create('Visitors Data', function($excel) use ($visitors_array){
				$excel->setTitle('Visitors Data');
				$excel->sheet('Visitors Data', function($sheet) use ($visitors_array){
					$sheet->fromArray($visitors_array, null, 'A1', false, false);
				});
			})->download('xlsx');
			
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('employee.e_emailid',$emailid)->get();
			$visitors_array[] = array('veid', 'e_emailid', 'date', 'visitername', 'companyname', 'area', 'vaddress', 'vdiscussion', 'vtime', 'vcontactnum', 'visiter_emailid');
			foreach($visitors as $visit)
			{
				$visitors_array[] = array(
					'veid' => $visit->veid,
					'e_emailid' => $visit->e_emailid,
					'date' => $visit->date,
					'visitername' => $visit->visitername,
					'companyname' => $visit->companyname,
					'area' => $visit->area,
					'vaddress' => $visit->vaddress,
					'vdiscussion' => $visit->vdiscussion,
					'vtime' => $visit->vtime,
					'vcontactnum' => $visit->vcontactnum,
					'visiter_emailid' => $visit->visiter_emailid
				);
			}
			Excel::create('Visitors Data', function($excel) use ($visitors_array){
				$excel->setTitle('Visitors Data');
				$excel->sheet('Visitors Data', function($sheet) use ($visitors_array){
					$sheet->fromArray($visitors_array, null, 'A1', false, false);
				});
			})->download('xlsx');
			
		}
		else{
			$visitors = VisitEntry::join('employee','visit_entry.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('date', [$cdate1, $cdate2])->where('employee.e_emailid',$emailid)->get();
			$visitors_array[] = array('veid', 'e_emailid', 'date', 'visitername', 'companyname', 'area', 'vaddress', 'vdiscussion', 'vtime', 'vcontactnum', 'visiter_emailid');
			foreach($visitors as $visit)
			{
				$visitors_array[] = array(
					'veid' => $visit->veid,
					'e_emailid' => $visit->e_emailid,
					'date' => $visit->date,
					'visitername' => $visit->visitername,
					'companyname' => $visit->companyname,
					'area' => $visit->area,
					'vaddress' => $visit->vaddress,
					'vdiscussion' => $visit->vdiscussion,
					'vtime' => $visit->vtime,
					'vcontactnum' => $visit->vcontactnum,
					'visiter_emailid' => $visit->visiter_emailid
				);
			}
			Excel::create('Visitors Data', function($excel) use ($visitors_array){
				$excel->setTitle('Visitors Data');
				$excel->sheet('Visitors Data', function($sheet) use ($visitors_array){
					$sheet->fromArray($visitors_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function collectexport($emailid,$cdate1,$cdate2)
	{		
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
			$collection_array[] = array('Name', 'Email', 'Order ID', 'Grandtotal', 'Payment Type','Paid Amount','Remaining Amount','Remind Date','Payment Date');
			foreach($collection as $ad)
			{
				$collection_array[] = array(
					'Name' => $ad->ename,
					'Email' => $ad->e_emailid,
					'Order ID' => $ad->oid,
					'Grandtotal' => $ad->grandtotal,
					'Payment Type' => $ad->paymenttype,
					'Paid Amount' => $ad->paidamount,
					'Remaining Amount' => $ad->amount,
					'Remind Date' => $ad->reminddate,
					'Payment Date' => $ad->date,
				);
			}
			Excel::create('Collection Data', function($excel) use ($collection_array){
				$excel->setTitle('Collection Data');
				$excel->sheet('Collection Data', function($sheet) use ($collection_array){
					$sheet->fromArray($collection_array, null, 'A1', false, false);
				});
			})->download('xlsx');
			
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	

			$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('payment.date', [$cdate1, $cdate2])->get();
			
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$emailid)->get();
			
		}
		else{			
			$collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->join('employee','employee.e_emailid','=','payment.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('payment.date', [$cdate1, $cdate2])->where('ordermaster.e_emailid',$emailid)->get();
			
		}
	}

	public function salesexport($emailid,$cdate1,$cdate2)
	{	
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();		
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
			$sales_array[] = array('Name', 'Email', 'Order date', 'Grandtotal','Order ID', 'Customer name','Customer company name','Customer contact no','Customer email ID');
			foreach($sales as $sl)
			{
				$sales_array[] = array(
					'Name' => $sl->ename,
					'Email' => $sl->e_emailid,
					'Order date' => $sl->date,
					'Grandtotal' => $sl->grandtotal,
					'Order ID' => $sl->oid,
					'Customer name' => $sl->customername,
					'Customer company name' => $sl->customercompanyname,
					'Customer contact no' => $sl->customercontactnum,
					'Customer email ID' => $sl->customeremailid
				);
			}
			Excel::create('Sales Data', function($excel) use ($sales_array){
				$excel->setTitle('Sales Data');
				$excel->sheet('Sales Data', function($sheet) use ($sales_array){
					$sheet->fromArray($sales_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('ordermaster.date', [$cdate1, $cdate2])->orderBy('ordermaster.date', 'desc')->get();
			$sales_array[] = array('Name', 'Email', 'Order date', 'Grandtotal','Order ID', 'Customer name','Customer company name','Customer contact no','Customer email ID');
			foreach($sales as $sl)
			{
				$sales_array[] = array(
					'Name' => $sl->ename,
					'Email' => $sl->e_emailid,
					'Order date' => $sl->date,
					'Grandtotal' => $sl->grandtotal,
					'Order ID' => $sl->oid,
					'Customer name' => $sl->customername,
					'Customer company name' => $sl->customercompanyname,
					'Customer contact no' => $sl->customercontactnum,
					'Customer email ID' => $sl->customeremailid
				);
			}
			Excel::create('Sales Data', function($excel) use ($sales_array){
				$excel->setTitle('Sales Data');
				$excel->sheet('Sales Data', function($sheet) use ($sales_array){
					$sheet->fromArray($sales_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$emailid)->orderBy('ordermaster.date', 'desc')->get();
			$sales_array[] = array('Name', 'Email', 'Order date', 'Grandtotal','Order ID', 'Customer name','Customer company name','Customer contact no','Customer email ID');
			foreach($sales as $sl)
			{
				$sales_array[] = array(
					'Name' => $sl->ename,
					'Email' => $sl->e_emailid,
					'Order date' => $sl->date,
					'Grandtotal' => $sl->grandtotal,
					'Order ID' => $sl->oid,
					'Customer name' => $sl->customername,
					'Customer company name' => $sl->customercompanyname,
					'Customer contact no' => $sl->customercontactnum,
					'Customer email ID' => $sl->customeremailid
				);
			}
			Excel::create('Sales Data', function($excel) use ($sales_array){
				$excel->setTitle('Sales Data');
				$excel->sheet('Sales Data', function($sheet) use ($sales_array){
					$sheet->fromArray($sales_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$sales = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->join('employee','employee.e_emailid','=','customer.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('ordermaster.date', [$cdate1, $cdate2])->where('ordermaster.e_emailid',$emailid)->orderBy('ordermaster.date', 'desc')->get();
			$sales_array[] = array('Name', 'Email', 'Order date', 'Grandtotal','Order ID', 'Customer name','Customer company name','Customer contact no','Customer email ID');
			foreach($sales as $sl)
			{
				$sales_array[] = array(
					'Name' => $sl->ename,
					'Email' => $sl->e_emailid,
					'Order date' => $sl->date,
					'Grandtotal' => $sl->grandtotal,
					'Order ID' => $sl->oid,
					'Customer name' => $sl->customername,
					'Customer company name' => $sl->customercompanyname,
					'Customer contact no' => $sl->customercontactnum,
					'Customer email ID' => $sl->customeremailid
				);
			}
			Excel::create('Sales Data', function($excel) use ($sales_array){
				$excel->setTitle('Sales Data');
				$excel->sheet('Sales Data', function($sheet) use ($sales_array){
					$sheet->fromArray($sales_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function complaintexport($emailid,$cdate1,$cdate2)
	{
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('complaint.date', 'desc')->get();
			$complaint_array[] = array('Employee Name', 'Employee Email Id', 'Date', 'Subject','Description','Mobile Number');
			foreach($complaints as $c)
			{
				$complaint_array[] = array(
					'Employee Name' => $c->ename,
					'Employee Email Id' => $c->e_emailid,
					'Date' => $c->date,
					'Subject' => $c->subject,
					'Description' => $c->description,
					'Mobile Number' => $c->mobilenum
				);
			}
			Excel::create('Complaint Data', function($excel) use ($complaint_array){
				$excel->setTitle('Complaint Data');
				$excel->sheet('Complaint Data', function($sheet) use ($complaint_array){
					$sheet->fromArray($complaint_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$cdate1, $cdate2])->orderBy('complaint.date', 'desc')->get();
			$complaint_array[] = array('Employee Name', 'Employee Email Id', 'Date', 'Subject','Description','Mobile Number');
			foreach($complaints as $c)
			{
				$complaint_array[] = array(
					'Employee Name' => $c->ename,
					'Employee Email Id' => $c->e_emailid,
					'Date' => $c->date,
					'Subject' => $c->subject,
					'Description' => $c->description,
					'Mobile Number' => $c->mobilenum
				);
			}
			Excel::create('Complaint Data', function($excel) use ($complaint_array){
				$excel->setTitle('Complaint Data');
				$excel->sheet('Complaint Data', function($sheet) use ($complaint_array){
					$sheet->fromArray($complaint_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('complaint.e_emailid',$emailid)->orderBy('complaint.date', 'desc')->get();
			$complaint_array[] = array('Employee Name', 'Employee Email Id', 'Date', 'Subject','Description','Mobile Number');
			foreach($complaints as $c)
			{
				$complaint_array[] = array(
					'Employee Name' => $c->ename,
					'Employee Email Id' => $c->e_emailid,
					'Date' => $c->date,
					'Subject' => $c->subject,
					'Description' => $c->description,
					'Mobile Number' => $c->mobilenum
				);
			}
			Excel::create('Complaint Data', function($excel) use ($complaint_array){
				$excel->setTitle('Complaint Data');
				$excel->sheet('Complaint Data', function($sheet) use ($complaint_array){
					$sheet->fromArray($complaint_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$cdate1, $cdate2])->where('complaint.e_emailid',$emailid)->orderBy('complaint.date', 'desc')->get();
			$complaint_array[] = array('Employee Name', 'Employee Email Id', 'Date', 'Subject','Description','Mobile Number');
			foreach($complaints as $c)
			{
				$complaint_array[] = array(
					'Employee Name' => $c->ename,
					'Employee Email Id' => $c->e_emailid,
					'Date' => $c->date,
					'Subject' => $c->subject,
					'Description' => $c->description,
					'Mobile Number' => $c->mobilenum
				);
			}
			Excel::create('Complaint Data', function($excel) use ($complaint_array){
				$excel->setTitle('Complaint Data');
				$excel->sheet('Complaint Data', function($sheet) use ($complaint_array){
					$sheet->fromArray($complaint_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function ginnieexport($emailid,$cdate1,$cdate2)
	{
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$wishlist = Wishlist::join('wishlist_cust','wishlist_cust.wcid','wishlist.wcid')->join('employee','wishlist.e_emailid','=','employee.e_emailid')->join('product','product.pid','=','wishlist.pid')->where('wishlist.c_emailid',session()->get('key'))->orderBy('wishlist.date', 'desc')->get();
			$ginnie_array[] = array('Employee Name', 'Employee Email Id', 'Customer Name', 'Customer Mobile', 'Customer Address','Expected Date','Customer Company Name','Date','Selling Price','Quantity','Product Name','Product Code');
			foreach($wishlist as $gb)
			{
				$ginnie_array[] = array(
					'Employee Name' => $gb->ename,
					'Employee Email Id' => $gb->e_emailid,
					'Customer Name' => $gb->custname,
					'Customer Email Id' => $gb->custemailid,
					'Customer Mobile' => $gb->custmobile,
					'Customer Address' => $gb->custaddress,
					'Expected Date' => $gb->expecteddate,
					'Customer Company Name' => $gb->cust_company_name,
					'Date' => $gb->date,
					'Selling Price' => $gb->sprice,
					'Quantity' => $gb->qty,
					'Product Name' => $gb->pname,
					'Product Code' => $gb->pcode
				);
			}
			Excel::create('Ginnie Box Data', function($excel) use ($ginnie_array){
				$excel->setTitle('Ginnie Box Data');
				$excel->sheet('Ginnie Box Data', function($sheet) use ($ginnie_array){
					$sheet->fromArray($ginnie_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$cdate1, $cdate2])->orderBy('complaint.date', 'desc')->get();
			$ginnie_array[] = array('Employee Name', 'Employee Email Id', 'Customer Name', 'Customer Mobile', 'Customer Address','Expected Date','Customer Company Name','Date','Selling Price','Quantity','Product Name','Product Code');
			foreach($wishlist as $gb)
			{
				$ginnie_array[] = array(
					'Employee Name' => $gb->ename,
					'Employee Email Id' => $gb->e_emailid,
					'Customer Name' => $gb->custname,
					'Customer Email Id' => $gb->custemailid,
					'Customer Mobile' => $gb->custmobile,
					'Customer Address' => $gb->custaddress,
					'Expected Date' => $gb->expecteddate,
					'Customer Company Name' => $gb->cust_company_name,
					'Date' => $gb->date,
					'Selling Price' => $gb->sprice,
					'Quantity' => $gb->qty,
					'Product Name' => $gb->pname,
					'Product Code' => $gb->pcode
				);
			}
			Excel::create('Ginnie Box Data', function($excel) use ($ginnie_array){
				$excel->setTitle('Ginnie Box Data');
				$excel->sheet('Ginnie Box Data', function($sheet) use ($ginnie_array){
					$sheet->fromArray($ginnie_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('complaint.e_emailid',$emailid)->orderBy('complaint.date', 'desc')->get();
			$ginnie_array[] = array('Employee Name', 'Employee Email Id', 'Customer Name', 'Customer Mobile', 'Customer Address','Expected Date','Customer Company Name','Date','Selling Price','Quantity','Product Name','Product Code');
			foreach($wishlist as $gb)
			{
				$ginnie_array[] = array(
					'Employee Name' => $gb->ename,
					'Employee Email Id' => $gb->e_emailid,
					'Customer Name' => $gb->custname,
					'Customer Email Id' => $gb->custemailid,
					'Customer Mobile' => $gb->custmobile,
					'Customer Address' => $gb->custaddress,
					'Expected Date' => $gb->expecteddate,
					'Customer Company Name' => $gb->cust_company_name,
					'Date' => $gb->date,
					'Selling Price' => $gb->sprice,
					'Quantity' => $gb->qty,
					'Product Name' => $gb->pname,
					'Product Code' => $gb->pcode
				);
			}
			Excel::create('Ginnie Box Data', function($excel) use ($ginnie_array){
				$excel->setTitle('Ginnie Box Data');
				$excel->sheet('Ginnie Box Data', function($sheet) use ($ginnie_array){
					$sheet->fromArray($ginnie_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$complaints = Complaint::join('employee','complaint.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('complaint.date', [$cdate1, $cdate2])->where('complaint.e_emailid',$emailid)->orderBy('complaint.date', 'desc')->get();
			$ginnie_array[] = array('Employee Name', 'Employee Email Id', 'Customer Name', 'Customer Mobile', 'Customer Address','Expected Date','Customer Company Name','Date','Selling Price','Quantity','Product Name','Product Code');
			foreach($wishlist as $gb)
			{
				$ginnie_array[] = array(
					'Employee Name' => $gb->ename,
					'Employee Email Id' => $gb->e_emailid,
					'Customer Name' => $gb->custname,
					'Customer Email Id' => $gb->custemailid,
					'Customer Mobile' => $gb->custmobile,
					'Customer Address' => $gb->custaddress,
					'Expected Date' => $gb->expecteddate,
					'Customer Company Name' => $gb->cust_company_name,
					'Date' => $gb->date,
					'Selling Price' => $gb->sprice,
					'Quantity' => $gb->qty,
					'Product Name' => $gb->pname,
					'Product Code' => $gb->pcode
				);
			}
			Excel::create('Ginnie Box Data', function($excel) use ($ginnie_array){
				$excel->setTitle('Ginnie Box Data');
				$excel->sheet('Ginnie Box Data', function($sheet) use ($ginnie_array){
					$sheet->fromArray($ginnie_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function leaveexport($emailid,$cdate1,$cdate2)
	{
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
			$leave_array[] = array('Employee Name', 'Employee Email Id', ' Request Date', 'Leave Start Date','Leave End Date','Leave Status');
			foreach($leave_requests as $l)
			{
				$leave_array[] = array(
					'Employee Name' => $l->ename,
					'Employee Email Id' => $l->e_emailid,
					'Request Date' => $l->requestdate,
					'Leave Start Date' => $l->leavestartdate,  
					'Leave End Date' => $l->leaveenddate,
					'Leave Status' => $l->status
				);
			}
			Excel::create('Leave Data', function($excel) use ($leave_array){
				$excel->setTitle('Leave Data');
				$excel->sheet('Leave Data', function($sheet) use ($leave_array){
					$sheet->fromArray($leave_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('leavereq.requestdate', [$cdate1, $cdate2])->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();	
			$leave_array[] = array('Employee Name', 'Employee Email Id', ' Request Date', 'Leave Start Date','Leave End Date','Leave Status');
			foreach($leave_requests as $l)
			{
				$leave_array[] = array(
					'Employee Name' => $l->ename,
					'Employee Email Id' => $l->e_emailid,
					'Request Date' => $l->requestdate,
					'Leave Start Date' => $l->leavestartdate,  
					'Leave End Date' => $l->leaveenddate,
					'Leave Status' => $l->status
				);
			}
			Excel::create('Leave Data', function($excel) use ($leave_array){
				$excel->setTitle('Leave Data');
				$excel->sheet('Leave Data', function($sheet) use ($leave_array){
					$sheet->fromArray($leave_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('leavereq.e_emailid',$emailid)->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
			$leave_array[] = array('Employee Name', 'Employee Email Id', ' Request Date', 'Leave Start Date','Leave End Date','Leave Status');
			foreach($leave_requests as $l)
			{
				$leave_array[] = array(
					'Employee Name' => $l->ename,
					'Employee Email Id' => $l->e_emailid,
					'Request Date' => $l->requestdate,
					'Leave Start Date' => $l->leavestartdate,  
					'Leave End Date' => $l->leaveenddate,
					'Leave Status' => $l->status
				);
			}
			Excel::create('Leave Data', function($excel) use ($leave_array){
				$excel->setTitle('Leave Data');
				$excel->sheet('Leave Data', function($sheet) use ($leave_array){
					$sheet->fromArray($leave_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$leave_requests = Leavereq::join('employee','leavereq.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('leavereq.requestdate', [$cdate1, $cdate2])->where('leavereq.e_emailid',$emailid)->orderBy('leavereq.requestdate', 'desc')->select('leavereq.*','employee.ename')->get();
			$leave_array[] = array('Employee Name', 'Employee Email Id', ' Request Date', 'Leave Start Date','Leave End Date','Leave Status');
			foreach($leave_requests as $l)
			{
				$leave_array[] = array(
					'Employee Name' => $l->ename,
					'Employee Email Id' => $l->e_emailid,
					'Request Date' => $l->requestdate,
					'Leave Start Date' => $l->leavestartdate,  
					'Leave End Date' => $l->leaveenddate,
					'Leave Status' => $l->status
				);
			}
			Excel::create('Leave Data', function($excel) use ($leave_array){
				$excel->setTitle('Leave Data');
				$excel->sheet('Leave Data', function($sheet) use ($leave_array){
					$sheet->fromArray($leave_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function customerexport($emailid,$cdate1,$cdate2)
	{
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
			$customer_array[] = array('Employee Name', 'Employee Email Id', ' Customer Name', 'Customer Company Name','Date','Customer Contact Number','Customer Email Id');
			foreach($customers as $cust)
			{
				$customer_array[] = array(
					' Employee Name' => $cust->ename,
					'Employee Email Id' => $cust->e_emailid,
					'Customer Name' => $cust->customername,
					'Customer Company Name' => $cust->customercompanyname,  
					'Date' => $cust->date,
					'Customer Contact Number ' => $cust->customercontactnum,
					'Customer Email Id' => $cust->c_emailid  
				);
			}
			Excel::create('Customer Data', function($excel) use ($customer_array){
				$excel->setTitle('Customer Data');
				$excel->sheet('Customer Data', function($sheet) use ($customer_array){
					$sheet->fromArray($customer_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('customer.date', [$cdate1, $cdate2])->get();
			$customer_array[] = array('Employee Name', 'Employee Email Id', ' Customer Name', 'Customer Company Name','Date','Customer Contact Number','Customer Email Id');
			foreach($customers as $cust)
			{
				$customer_array[] = array(
					' Employee Name' => $cust->ename,
					'Employee Email Id' => $cust->e_emailid,
					'Customer Name' => $cust->customername,
					'Customer Company Name' => $cust->customercompanyname,  
					'Date' => $cust->date,
					'Customer Contact Number ' => $cust->customercontactnum,
					'Customer Email Id' => $cust->c_emailid  
				);
			}
			Excel::create('Customer Data', function($excel) use ($customer_array){
				$excel->setTitle('Customer Data');
				$excel->sheet('Customer Data', function($sheet) use ($customer_array){
					$sheet->fromArray($customer_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('customer.e_emailid',$emailid)->get();
			$customer_array[] = array('Employee Name', 'Employee Email Id', ' Customer Name', 'Customer Company Name','Date','Customer Contact Number','Customer Email Id');
			foreach($customers as $cust)
			{
				$customer_array[] = array(
					' Employee Name' => $cust->ename,
					'Employee Email Id' => $cust->e_emailid,
					'Customer Name' => $cust->customername,
					'Customer Company Name' => $cust->customercompanyname,  
					'Date' => $cust->date,
					'Customer Contact Number ' => $cust->customercontactnum,
					'Customer Email Id' => $cust->c_emailid  
				);
			}
			Excel::create('Customer Data', function($excel) use ($customer_array){
				$excel->setTitle('Customer Data');
				$excel->sheet('Customer Data', function($sheet) use ($customer_array){
					$sheet->fromArray($customer_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$customers = Customer::join('employee','customer.e_emailid','=','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->whereBetween('customer.date', [$cdate1, $cdate2])->where('customer.e_emailid',$emailid)->get();
			$customer_array[] = array('Employee Name', 'Employee Email Id', ' Customer Name', 'Customer Company Name','Date','Customer Contact Number','Customer Email Id');
			foreach($customers as $cust)
			{
				$customer_array[] = array(
					' Employee Name' => $cust->ename,
					'Employee Email Id' => $cust->e_emailid,
					'Customer Name' => $cust->customername,
					'Customer Company Name' => $cust->customercompanyname,  
					'Date' => $cust->date,
					'Customer Contact Number ' => $cust->customercontactnum,
					'Customer Email Id' => $cust->c_emailid  
				);
			}
			Excel::create('Customer Data', function($excel) use ($customer_array){
				$excel->setTitle('Customer Data');
				$excel->sheet('Customer Data', function($sheet) use ($customer_array){
					$sheet->fromArray($customer_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function pendingcollectexport($emailid,$cdate1,$cdate2)
	{
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
		if(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)=="no"){
			$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
			$remind = $collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
			$pending_collection_array[] = array('Name', 'Email', ' Order Date', 'Order Id','Grand Total','Total Paid Amount','Total Pending Amount','Remind Date');
			foreach($pending_collection as $pc)
			{
				$pa = $pc->grandtotal - $pc->paidamount;
				foreach ($remind as $r) {
					if($r->oid == $pc->oid){
						$remindd = $r->reminddate;
					}
				}
				$pending_collection_array[] = array(
					'Name' => $pc->ename,
					'Email' => $pc->e_emailid,
					'Order Date' => $pc->date,
					'Order Id' => $pc->oid,
					'Grand Total' => $pc->grandtotal,  
					'Total Paid Amount' => $pc->paidamount,
					'Total Pending Amount' => $pa,
					'Remind Date' =>$remindd
				);
			}
			Excel::create('Pending Collection Data', function($excel) use ($pending_collection_array){
				$excel->setTitle('Pending Collection Data');
				$excel->sheet('Pending Collection Data', function($sheet) use ($pending_collection_array){
					$sheet->fromArray($pending_collection_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)!="no" && ($cdate2)!="no" && ($emailid)=="no"){	
			$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('date', [$cdate1, $cdate2])->orderBy('ordermaster.date', 'desc')->get();	
			$remind = $collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
			$pending_collection_array[] = array('Name', 'Email', ' Order Date', 'Order Id','Grand Total','Total Paid Amount','Total Pending Amount','Remind Date');
			foreach($pending_collection as $pc)
			{
				$pa = $pc->grandtotal - $pc->paidamount;
				foreach ($remind as $r) {
					if($r->oid == $pc->oid){
						$remindd = $r->reminddate;
					}
				}
				$pending_collection_array[] = array(
					'Name' => $pc->ename,
					'Email' => $pc->e_emailid,
					'Order Date' => $pc->date,
					'Order Id' => $pc->oid,
					'Grand Total' => $pc->grandtotal,  
					'Total Paid Amount' => $pc->paidamount,
					'Total Pending Amount' => $pa,
					'Remind Date' =>$remindd
				);
			}
			Excel::create('Pending Collection Data', function($excel) use ($pending_collection_array){
				$excel->setTitle('Pending Collection Data');
				$excel->sheet('Pending Collection Data', function($sheet) use ($pending_collection_array){
					$sheet->fromArray($pending_collection_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($cdate1)=="no" && ($cdate2)=="no" && ($emailid)!="no"){
			$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.e_emailid')->where('ordermaster.c_emailid',session()->get('key'))->where('ordermaster.e_emailid',$emailid)->orderBy('ordermaster.date', 'desc')->get();
			$remind = $collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
			$pending_collection_array[] = array('Name', 'Email', ' Order Date', 'Order Id','Grand Total','Total Paid Amount','Total Pending Amount','Remind Date');
			foreach($pending_collection as $pc)
			{
				$pa = $pc->grandtotal - $pc->paidamount;
				foreach ($remind as $r) {
					if($r->oid == $pc->oid){
						$remindd = $r->reminddate;
					}
				}
				$pending_collection_array[] = array(
					'Name' => $pc->ename,
					'Email' => $pc->e_emailid,
					'Order Date' => $pc->date,
					'Order Id' => $pc->oid,
					'Grand Total' => $pc->grandtotal,  
					'Total Paid Amount' => $pc->paidamount,
					'Total Pending Amount' => $pa,
					'Remind Date' =>$remindd
				);
			}
			Excel::create('Pending Collection Data', function($excel) use ($pending_collection_array){
				$excel->setTitle('Pending Collection Data');
				$excel->sheet('Pending Collection Data', function($sheet) use ($pending_collection_array){
					$sheet->fromArray($pending_collection_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$pending_collection = Ordermaster::join('employee','employee.e_emailid','=','ordermaster.ue_emailid')->where('ordermaster.c_emailid',session()->get('key'))->whereBetween('date', [$cdate1, $cdate2])->where('ordermaster.e_emailid',$emailid)->orderBy('ordermaster.date', 'desc')->get();
			$remind = $collection = Ordermaster::join('payment','ordermaster.oid','=','payment.oid')->where('ordermaster.c_emailid',session()->get('key'))->get();
			$pending_collection_array[] = array('Name', 'Email', ' Order Date', 'Order Id','Grand Total','Total Paid Amount','Total Pending Amount','Remind Date');
			foreach($pending_collection as $pc)
			{
				$pa = $pc->grandtotal - $pc->paidamount;
				foreach ($remind as $r) {
					if($r->oid == $pc->oid){
						$remindd = $r->reminddate;
					}
				}
				$pending_collection_array[] = array(
					'Name' => $pc->ename,
					'Email' => $pc->e_emailid,
					'Order Date' => $pc->date,
					'Order Id' => $pc->oid,
					'Grand Total' => $pc->grandtotal,  
					'Total Paid Amount' => $pc->paidamount,
					'Total Pending Amount' => $pa,
					'Remind Date' =>$remindd
				);
			}
			Excel::create('Pending Collection Data', function($excel) use ($pending_collection_array){
				$excel->setTitle('Pending Collection Data');
				$excel->sheet('Pending Collection Data', function($sheet) use ($pending_collection_array){
					$sheet->fromArray($pending_collection_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
	}

	public function stockexport($product,$category,$subcategory)
	{
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
		if(($product)=="no" && ($category)=="no" && ($subcategory)=="no"){
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock,
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
					
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($product)!="no" && ($category)=="no" && ($subcategory)=="no"){
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.pid',$product)->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock, 
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($product)=="no" && ($category)!="no" && ($subcategory)=="no"){
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('subcategory.catid',$category)->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock,  
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($product)=="no" && ($category)=="no" && ($subcategory)!="no"){
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$subcategory)->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock,  
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		elseif(($product)=="no" && ($category)!="no" && ($subcategory)!="no"){
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$subcategory)->where('subcategory.catid',$category)->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock,  
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		else{
			$products = Product::join('subcategory','product.subcatid','=','subcategory.subcatid')->join('category','category.catid','=','subcategory.catid')->where('product.subcatid',$subcategory)->where('subcategory.catid',$category)->where('product.pid',$product)->where('product.c_emailid',session()->get('key'))->get();
			$product_array[] = array('Product Name', 'Product Code', ' Stock', 'Minimum Stock','Subcategory Name','Category Name');
			foreach($products as $stock)
			{
				$product_array[] = array(
					' Product Name' => $stock->pname,
					'Product Code' => $stock->pcode,
					'Stock' => $stock->stock,
					'Minimum Stock' => $stock->minimum_stock,  
					'Subcategory Name' => $stock->subcatname,
					'Category Name' => $stock->catname
				);
			}
			Excel::create('Stock Data', function($excel) use ($product_array){
				$excel->setTitle('Stock Data');
				$excel->sheet('Stock Data', function($sheet) use ($product_array){
					$sheet->fromArray($product_array, null, 'A1', false, false);
				});
			})->download('xlsx');
		}
		
	}
}
