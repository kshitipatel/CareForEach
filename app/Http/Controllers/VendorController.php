<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyVender;
use App\Models\Product;
use Session;

class VendorController extends Controller
{
	public function index(Request $request)
	{
    	//session check    
		$vendors = MyVender::where('c_emailid',session()->get('key'))->get(); 
		$products = Product::where('c_emailid',session()->get('key'))->get();
		return view('vendor.vendorList')->with(array('vendors'=> $vendors, 'products'=> $products, 'cmp' => session()->get('key')));
	}
	public function add(Request $request)
	{
        //route('session.check');
		$value = $request->session()->get('key');
		$products = Product::where('c_emailid',session()->get('key'))->get();
		return view('vendor.addvendor')->with(array('products'=> $products, 'cmp' => session()->get('key')));
	}
	public function store(Request $request)
	{  
		$vendor = new MyVender; 
		$image = $request->file('image');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/images');
		$image->move($destinationPath,$input['imagename']);
		$value = 'http://www.careforeach.com/company/webservices/images/'.$_FILES["image"]["name"];
		$vendor->photo = $value;
		$vendor->contactpersonname = $request->contactpersonname;
		$vendor->companyname = $request->companyname;
		$vendor->contact = $request->contact;
		$vendor->email = $request->email;
		$vendor->address = $request->address;
		$vendor->city = $request->city;
		$vendor->mail_data = $request->mail_data;
		$value = $request->input('vdp');
		$prod=implode(",", $value);
		$vendor->productname = $prod;
		$vendor->c_emailid = $request->session()->get('key');
		$vendor->save();
		Session::flash('success','You succesfully added a vendor.');
		return redirect()->route('vendor.list');
	}
	public function edit($id)
	{
        //route('session.check');
		$vendor = MyVender::find($id);
		$products = Product::where('c_emailid',session()->get('key'))->get();
		return view('vendor.editVendor')->with(array('vendor' => $vendor, 'products'=> $products, 'cmp' => session()->get('key')));   
	}
	public function update(Request $request, $id)
	{
		$vendor = MyVender::find($id);
		if($request->hasFile('image')){
			$image = $request->file('image');
			$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath,$input['imagename']);
			$value = 'http://www.careforeach.com/company/webservices/images/'.$_FILES["image"]["name"];
			$vendor->photo = $value;
			$vendor->contactpersonname = $request->contactpersonname;
			$vendor->companyname = $request->companyname;
			$vendor->contact = $request->contact;
			$vendor->email = $request->email;
			$vendor->address = $request->address;
			$vendor->city = $request->city;
			$vendor->mail_data = $request->mail_data;
			$value = $request->input('vdp');
			$prod=implode(",", $value);
			$vendor->productname = $prod;
			$vendor->c_emailid = $request->session()->get('key');
			$vendor->save();
			Session::flash('success','You succesfully updated an vendor\'s detail.');
			return redirect()->route('vendor.list');
		}  
		else{
			$vendor->photo = $vendor->photo;
			$vendor->contactpersonname = $request->contactpersonname;
			$vendor->companyname = $request->companyname;
			$vendor->contact = $request->contact;
			$vendor->email = $request->email;
			$vendor->address = $request->address;
			$vendor->city = $request->city;
			$vendor->mail_data = $request->mail_data;
			$value = $request->input('vdp');
			$prod=implode(",", $value);
			$vendor->productname = $prod;
			$vendor->c_emailid = $request->session()->get('key');
			$vendor->save();
			Session::flash('success','You succesfully updated an vendor\'s detail.');
			return redirect()->route('vendor.list');
		} 
	}
	public function delete($id)
	{
        //route('session.check');
		MyVender::where('vid', $id)->delete();
		Session::flash('success','You succesfully deleted a vendor.');
		return redirect()->back();

	}
}
