<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Session;

class SubcategoryController extends Controller
{
    public function index(){
    	route('session.check');    
        $subcategories = Subcategory::join('category','subcategory.catid','=','category.catid')->where('subcategory.c_emailid',session()->get('key'))->get(); 
        //dd($subcategories);  
        return view('subcategory.subcategoryList')->with(array('subcategory'=> $subcategories, 'cmp' => session()->get('key')));
    }

    public function add(Request $request)
    {
        route('session.check');
        $categories = Category::all();
        return view('subcategory.addSubcategory')->with(array('category'=> $categories, 'cmp' => session()->get('key')));
    }

    public function store(Request $request)
    {    
        $subcategory = new Subcategory;
        $subcategory->catid = $request->catid;
        $subcategory->subcatname = $request->subcatname;
        $subcategory->c_emailid = $request->session()->get('key');
        $subcategory->save();
        Session::flash('success','You succesfully created a subcategory.');
        return redirect()->route('subcategory.list');
        
    }
    public function edit($id)
    {
        $categories = Category::all();
        $subcategory = Subcategory::join('category','subcategory.catid','category.catid')->find($id);
        return view('subcategory.subcategoryEdit')->with(array('subcategory'=> $subcategory, 'categories'=> $categories, 'cmp'=> session()->get('key')));
    }

    public function update(Request $request,$id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->catid = $request->catid;
        $subcategory->subcatname = $request->subcatname;
        $subcategory->c_emailid = $request->session()->get('key');
        $subcategory->save();
        Session::flash('success','You succesfully updated a subcategory.');
        return redirect()->route('subcategory.list');
    }

    public function delete($id)
    {
        Subcategory::where('subcatid', $id)->delete();
        Session::flash('success','You succesfully deleted an subcategory.');
        return redirect()->back();
    }

}
