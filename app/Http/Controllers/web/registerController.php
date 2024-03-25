<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registerController extends Controller
{
    public function web_register()
    {
       return view('web.register');
    }

    public function data_register(Request $request)
    {
        // return $request;
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|email",
            "password"=>"required|confirmed",
        ]);

        User::create([
          "name"=>$request->input('name'),
          "email"=>$request->input('email'),
          "password"=>Hash::make($request->input('password'))
        ]);
       return redirect()->route('web/login');
    }
}
