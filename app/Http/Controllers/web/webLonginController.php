<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class webLonginController extends Controller
{
    public function login(){

        return view('web.login');
    }

    public function data(Request $request){

        // return $request;
        if(Auth::guard('web')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

            return redirect()->route('web/index');
        }
        else
        return redirect()->route('web/login');

    }

    public function logout(){

        Auth::guard('web')->logout();
        return redirect()->route('web/login');

    }



    }


