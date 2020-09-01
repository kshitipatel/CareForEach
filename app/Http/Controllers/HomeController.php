<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Attendance;
use App\Models\Ordermaster;
use App\Models\Employee;
use App\Models\MyVender;
use App\Models\Wishlist;
use App\Models\VisitEntry;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Leavereq;
use App\Models\Complaint;


class HomeController extends Controller
{
    
    public function index()
    {
        return view('sidebar');
    }

    public function check(Request $request)
    {
        $check = Company::where('c_emailid',$request->emailid)->where('password',$request->password)->get();
    	if (count($check)==1){
            $request->session()->put('key', $request->emailid );
           return view('Home')->with('cmp',session()->get('key'));
    	}
    	else{
    		return redirect()->back();
    	}
    }

    public function dashboard()
    {
        $order = Ordermaster::where('c_emailid',session()->get('key'))->get();
        $attendance = Attendance::join('employee','employee.e_emailid','attendance.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
        $employee = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
        $vendor = MyVender::where('c_emailid',session()->get('key'))->get();
        $ginnie = Wishlist::where('c_emailid',session()->get('key'))->get();
        $visit = VisitEntry::join('employee','employee.e_emailid','visit_entry.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
        $product = Product::where('c_emailid',session()->get('key'))->get();
        $leave = Leavereq::join('employee','employee.e_emailid','leavereq.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();      
        $category = Category::where('c_emailid',session()->get('key'))->get();
        $subcategory = Subcategory::where('c_emailid',session()->get('key'))->get();
        $complaint = Complaint::join('employee','employee.e_emailid','complaint.e_emailid')->where('employee.c_emailid',session()->get('key'))->get();
        return view('dashboard')->with(array('order'=> count($order), 'attendance'=> count($attendance), 'employee'=> count($employee), 'vendor'=> count($vendor), 'ginnie'=> count($ginnie), 'visit'=> count($visit), 'product'=> count($product), 'leave'=> count($leave), 'category'=> count($category), 'subcategory'=> count($subcategory), 'complaint'=> count($complaint), 'cmp'=>session()->get('key')));
    }

    public function profile()
    {
        $company = Company::where('c_emailid',session()->get('key'))->first();
        return view('companyProfile')->with(array('company'=> $company,'cmp'=>session()->get('key')));
    }

    public function changepassword($id)
    {
        $company = Company::find($id);
        return view('changepassword')->with(array('company'=> $company,'cmp'=>session()->get('key')));
    }

    public function updatepassword(Request $request, $id)
    {
        $company = Company::find($id);
        $company->password = $request->pwd;
        $company->save();
        return redirect()->route('profile');
    }

    public function logout(Request $request)
    {
     $request->session()->forget('key');
      $request->session()->flush();
      return route('login');
    }
}
