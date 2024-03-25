<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
   public function login(){
    return view('admin.login');
   }


   public function data(Request $request){
    // return $request;
    if(Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

        return redirect()->route('product/index');
    }
    else{

        return redirect()->route('admin/login');
    }
   }
}
