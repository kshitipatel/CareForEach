<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
	public function index(Request $request)
    {
    	return view('contact_us.contactUs')->with('cmp', session()->get('key'));
    }
}
