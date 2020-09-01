<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
   public function accessSessionData(Request $request) {
      if($request->session()->has('key'))
      {
         $value = $request->session()->get('key');
         return 	$value;
      }
   }
   public function checkSessionStatus(Request $request){
      if($request->session()->has('key'))
      {
         return redirect()->back();
      }
      else{
         return view('welcome');
      }
   }
   /*public function storeSessionData(Request $request) {
      $request->session()->put('key','Value');
      echo "Data has been added to session";
   }*/

   public function deleteSessionData(Request $request) {
      $request->session()->forget('key');
      $request->session()->flush();
      //echo 'value';
      //echo $request->session()->get('key');
      return redirect()->route('login');
   }
}

