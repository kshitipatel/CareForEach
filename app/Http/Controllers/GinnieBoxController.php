<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\WishlistCust;

class GinnieBoxController extends Controller
{
    public function index(Request $request)
    {
    	$wishlist_customer = WishlistCust::join('employee','wishlist_cust.e_emailid','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->orderBy('wishlist_cust.expecteddate', 'desc')->get();
    	$wishlist = WishlistCust::join('wishlist','wishlist_cust.wcid','wishlist.wcid')->where('wishlist.c_emailid',session()->get('key'))->get();
    	return view('ginnie_box.ginnie_box')->with(array('customers'=> $wishlist_customer,'wishlist'=>$wishlist ,'cmp'=>$request->session()->get('key')));
    }
    public function gview($id)
    {
    	$wishlist_customer = WishlistCust::join('employee','wishlist_cust.e_emailid','employee.e_emailid')->where('employee.c_emailid',session()->get('key'))->where('wishlist_cust.wcid',$id)->first();	
    	$wishlist = WishlistCust::join('wishlist','wishlist_cust.wcid','wishlist.wcid')->where('wishlist.c_emailid',session()->get('key'))->get();	
		$wishlist_product = Wishlist::join('product','product.pid','wishlist.pid')->where('wishlist.wcid',$id)->get();	
		return view('ginnie_box.wishlistDetails')->with(array('customer'=> $wishlist_customer,'products' => $wishlist_product,'wishlist'=>$wishlist ,'cmp' => session()->get('key')));
    }
    public function export($id)
    {
        echo $id;
    }
}
