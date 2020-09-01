<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordermaster;
use App\Models\Orderdetails;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Payment;
use App\Models\Product;
use Session;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		$employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
		if(($request->time)==NULL && ($request->employee)==NULL){
			$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->get();
			return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
		}
		else{
			if(($request->time)!=NULL && ($request->employee)==NULL){
				if(($request->time)=='month'){
					$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->whereMonth('ordermaster.date',date('m'))->whereYear('ordermaster.date',date('Y'))->get();
					return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
				}
				else{					
					$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->whereYear('ordermaster.date',date('Y'))->get();
					return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
				}
				
			}
			else{
				if(($request->time)==NULL && ($request->employee)!=NULL){
					$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->where('ordermaster.e_emailid',$request->employee)->get();
					return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
				}
				else{
					if(($request->time)=='month'){
						$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->whereMonth('ordermaster.date',date('m'))->whereYear('ordermaster.date',date('Y'))->where('ordermaster.e_emailid',$request->employee)->get();
						return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
					}
					else{					
						$orders = Ordermaster::join('customer','ordermaster.customerid','=','customer.customerid')->where('ordermaster.c_emailid',session()->get('key'))->orderBy('ordermaster.date', 'desc')->whereYear('ordermaster.date',date('Y'))->where('ordermaster.e_emailid',$request->employee)->get();
						return view('order.allOrders')->with(array('orders'=> $orders,'employees' => $employees,'cmp' => session()->get('key')));
					}
				}
			}
		}

	}

	public function oview($id)
	{
		$customer_employee = Ordermaster::join('customer','customer.customerid','ordermaster.customerid')->join('employee','customer.e_emailid','employee.e_emailid')->where('oid',$id)->first();		
		$payments = Ordermaster::join('payment','payment.oid','ordermaster.oid')->where('ordermaster.oid',$id)->orderBy('payment.date', 'asc')->select('ordermaster.*','payment.paymentid','payment.customerid','payment.amount','payment.paymenttype','payment.date as p_date','payment.reminddate')->get();	
		return view('order.orderDetails')->with(array('customer_employee'=> $customer_employee,'payments' => $payments,'cmp' => session()->get('key')));

	}

	public function pview($id)
	{
		$customer_employee = Ordermaster::join('customer','customer.customerid','ordermaster.customerid')->where('oid',$id)->first();		
		$productdetails = Ordermaster::join('orderdetails','ordermaster.oid','orderdetails.oid')->join('product','orderdetails.pid','product.pid')->where('ordermaster.oid',$id)->get();
		return view('order.viewProduct')->with(array('customer_employee'=> $customer_employee,'productdetails'=> $productdetails,'cmp' => session()->get('key')));

	}
}
