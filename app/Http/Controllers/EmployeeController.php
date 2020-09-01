<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;
use App\Models\Company; 
use Session;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {     
        $employees = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();   
        return view('employee.employeeList')->with(array('employee'=> $employees, 'cmp' => session()->get('key')));        
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.employeeProfile')->with(array('employee'=> $employee, 'cmp' => session()->get('key')));
    }

    public function add(Request $request)
    {
        $value = $request->session()->get('key');
        $employee = Employee::where('c_emailid',session()->get('key'))->where('status','Active')->get();
        $total_emp_allowed = Company::where('c_emailid',session()->get('key'))->select('totalemp')->first();
        if(sizeof($employee->toArray()) == $total_emp_allowed->totalemp){         
           return redirect()->back() ->with('alert', 'You have reached maximum employee limit! To add new employee please contact your database administrator.');
        }
        else{
            return view('employee.addEmployee')->with(array('employee'=>NULL ,'cmp' => session()->get('key')));
        }

    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$input['imagename']);

        $value = 'http://www.careforeach.com/company/webservices/employeephoto/'.$_FILES["image"]["name"];
        $employee = new Employee;
        $employee->photo = $value;
        $employee->ename = $request->ename;
        $employee->dob = $request->dob;
        $employee->joiningdate = $request->joiningdate;
        $employee->designation = $request->designation;
        $employee->edu = $request->edu;
        $employee->e_emailid = $request->e_emailid;
        $employee->mobilenum = $request->mobilenum;
        $employee->address = $request->address;
        $employee->password = $request->password;
        $employee->status = "Active";
        $employee->c_emailid = $request->session()->get('key');
        $employee->save();
        Session::flash('success','You succesfully added an employee.');
        return redirect()->route('employee.list');

    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.editEmployee')->with(array('employee'=> $employee, 'cmp' => session()->get('key')));   
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$input['imagename']);
            $value = 'http://www.careforeach.com/company/webservices/employeephoto/'.$_FILES["image"]["name"];
            $employee->photo = $value;
            $employee->ename = $request->ename;
            $employee->dob = $request->dob;
            $employee->joiningdate = $request->joiningdate;
            $employee->designation = $request->designation;
            $employee->edu = $request->edu;
            $employee->e_emailid = $request->e_emailid;
            $employee->mobilenum = $request->mobilenum;
            $employee->address = $request->address;
            $employee->password = $request->password;
            $employee->status = "Active";
            $employee->c_emailid = $request->session()->get('key');
            $employee->save();
            Session::flash('success','You succesfully updated an employee\'s detail.');
            return redirect()->route('employee.list');
        }  
        else{
            $employee->photo = $employee->photo;
            $employee->ename = $request->ename;
            $employee->dob = $request->dob;
            $employee->joiningdate = $request->joiningdate;
            $employee->designation = $request->designation;
            $employee->edu = $request->edu;
            $employee->e_emailid = $request->e_emailid;
            $employee->mobilenum = $request->mobilenum;
            $employee->address = $request->address;
            $employee->password = $request->password;
            $employee->status = "Active";
            $employee->c_emailid = $request->session()->get('key');
            $employee->save();
            Session::flash('success','You succesfully updated an employee\'s detail.');
            return redirect()->route('employee.list');
        } 
    }

    public function delete($id)
    {
        Employee::where('eid', $id)->update(['status' => "Deactive"]);
        Session::flash('success','You succesfully deleted an employee.');
        return redirect()->back();
    }
}
