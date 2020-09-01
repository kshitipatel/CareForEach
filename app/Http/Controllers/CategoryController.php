<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
    public function index(){
    	route('session.check');    
        $categories = Category::where('c_emailid',session()->get('key'))->get();   
        return view('category.categoryList')->with(array('category'=> $categories, 'cmp' => session()->get('key')));
    }

    public function add(Request $request)
    {
        route('session.check');
        $value = $request->session()->get('key');
        return view('category.addCategory')->with('cmp', session()->get('key'));
    }

    public function store(Request $request)
    {    
        $category = new Category;
        $category->catname = $request->catname;
        $category->gst = $request->gst;
        $category->c_emailid = $request->session()->get('key');
        $category->save();
        Session::flash('success','You succesfully created a category.');
        return redirect()->route('category.list');
        
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.categoryEdit')->with(array('category'=> $category, 'cmp'=> session()->get('key')));
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->catname = $request->catname;
        $category->gst = $request->gst;
        $category->c_emailid = $request->session()->get('key');
        $category->save();
        Session::flash('success','You succesfully updated a category.');
        return redirect()->route('category.list');
    }

    public function delete($id)
    {
        Category::where('catid', $id)->delete();
        Session::flash('success','You succesfully deleted an category.');
        return redirect()->back();
    }
}

