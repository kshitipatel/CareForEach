<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Session;

class ProductController extends Controller
{
	public function index(Request $request)
	{
		//route('session.check');
		
		$subcategories = Subcategory::where('c_emailid',session()->get('key'))->get();
		$categories = Category::where('c_emailid',session()->get('key'))->get();
		if(($request->subcatid)==NULL && ($request->catid)==NULL){
			$products = Product::where('c_emailid',session()->get('key'))->get();
			return view('product.productList')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories, 'selectedcat'=>$request->catid, 'selectedsubcat'=>$request->subcatid , 'cmp' => session()->get('key')));
		}
		else{
			if(($request->subcatid)!=NULL && ($request->catid)==NULL){
				$subcat = SubCategory::find($request->subcatid);
				$products = Product::where('c_emailid',session()->get('key'))->where('subcatid',$request->subcatid)->get();
				return view('product.productList')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories, 'selectedsubcat'=>$subcat, 'selectedcat'=>$request->catid , 'cmp' => session()->get('key')));
			}
			else{
				if(($request->subcatid)==NULL && ($request->catid)!=NULL){
					$subcategories = Subcategory::where('c_emailid',session()->get('key'))->where('catid',$request->catid)->get();
					$cat = Category::find($request->catid);
					$products = Product::join('subcategory','product.subcatid','subcategory.subcatid')->join('category','subcategory.catid','category.catid')->where('subcategory.catid',$request->catid)->where('product.c_emailid',session()->get('key'))->get();
					return view('product.productList')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories, 'selectedcat'=>$cat, 'selectedsubcat'=>$request->subcatid, 'cmp' => session()->get('key')));
				}
				else{
					$cat = Category::find($request->catid);
					$subcat = SubCategory::find($request->subcatid);
					$subcategories = Subcategory::where('c_emailid',session()->get('key'))->where('catid',$request->catid)->get();
					$products = Product::join('subcategory','product.subcatid','subcategory.subcatid')->join('category','subcategory.catid','category.catid')->where('subcategory.catid',$request->catid)->where('product.subcatid',$request->subcatid)->where('product.c_emailid',session()->get('key'))->get();
					return view('product.productList')->with(array('products'=> $products,'subcategories'=>$subcategories,'categories'=>$categories,'selectedsubcat'=>$subcat, 'selectedcat'=>$cat, 'cmp' => session()->get('key')));
				}
			}
		}
		
	}

	public function add(Request $request)
	{
        //route('session.check');
		$value = $request->session()->get('key');
		$subcategories = Subcategory::where('c_emailid',session()->get('key'))->get();
		return view('product.addProduct')->with(array('product'=>NULL ,'subcategories'=>$subcategories, 'cmp' => session()->get('key')));
	}

	public function store(Request $request)
	{    
		$product = new Product;
		$image = $request->file('image');
		$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
		$destinationPath = public_path('/images');
		$image->move($destinationPath,$input['imagename']);
		$value = 'http://www.careforeach.com/company/webservices/productimages/'.$_FILES["image"]["name"];
		$product->pphoto = $value;
		$product->pname = $request->pname;
		$product->pcode = $request->pcode;
		$product->pdesc = $request->pdesc;
		$product->price = $request->price;
		$product->stock = $request->stock;
		$product->subcatid = $request->subcatid;
		$product->minimum_stock = $request->minimum_stock;
		$product->msprice = $request->msprice;
		$product->c_emailid = $request->session()->get('key');
		$product->save();
		Session::flash('success','You succesfully added a product.');
		return redirect()->route('product.list');
	} 

	public function show($id)
	{
        $product = Product::find($id);
		return view('product.productDetails')->with(array('product'=> $product, 'cmp' => session()->get('key')));
	}

	public function edit($id)
	{
        $product = Product::find($id);
        $category = Subcategory::join('category','subcategory.catid','category.catid')->find($product->subcatid);
        $subcategories = Subcategory::where('c_emailid',session()->get('key'))->where('catid',$category->catid)->get();
		return view('product.editProduct')->with(array('product'=> $product, 'subcategories'=>$subcategories, 'cmp' => session()->get('key')));   
	}

	public function update(Request $request, $id)
	{
		$product = Product::find($id);
		if($request->hasFile('image')){
			$image = $request->file('image');
			$input['imagename'] = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images');
			$image->move($destinationPath,$input['imagename']);
			$value = 'http://www.careforeach.com/company/webservices/productimages/'.$_FILES["image"]["name"];
			$product->pphoto = $value;
			$product->pname = $request->pname;
			$product->pcode = $request->pcode;
			$product->pdesc = $request->pdesc;
			$product->price = $request->price;
			$product->stock = $request->stock;
			$product->subcatid = $request->subcatid;
			$product->minimum_stock = $request->minimum_stock;
			$product->msprice = $request->msprice;
			$product->c_emailid = $request->session()->get('key');
			$product->save();
			Session::flash('success','You succesfully updated an product\'s detail.');
			return redirect()->route('product.list');
		}  
		else{
			$product->pphoto = $product->pphoto;
			$product->pname = $request->pname;
			$product->pcode = $request->pcode;
			$product->pdesc = $request->pdesc;
			$product->price = $request->price;
			$product->stock = $request->stock;
			$product->subcatid = $request->subcatid;
			$product->minimum_stock = $request->minimum_stock;
			$product->msprice = $request->msprice;
			$product->c_emailid = $request->session()->get('key');
			$product->save();
			Session::flash('success','You succesfully updated an product\'s detail.');
			return redirect()->route('product.list');
		} 
	}

	public function delete($id)
	{
        //route('session.check');
		Product::where('pid', $id)->delete();
		Session::flash('success','You succesfully deleted a product.');
		return redirect()->route('product.list');

	}

	
}
