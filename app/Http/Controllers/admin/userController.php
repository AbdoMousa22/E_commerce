<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\adminRequest;
use App\Models\admin;
use App\Models\priv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\FlareClient\View;

class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('Users')->except('logout');
        $this->middleware('support')->except(["index","insert","add","logout"]);

    }



   public function index(){
    $admin=admin::all();
    $id=1;
    return view('admin.users.user',compact('admin','id'));
   }

   public function add(){
    $priv=priv::all();

    return view('admin.users.add',compact('priv'));
   }

   public function insert(adminRequest $request){

    // return $request;
    admin::create([
        "name"=>$request->input('name'),
        "email"=>$request->input('email'),
        "password"=>Hash::make($request->input('password')),
        "gender"=>$request->input('gender'),
        "priv"=>$request->input('priv')
    ]);
return redirect()->route('admin/index');

   }

   public function edite($id){

    $data_admin=admin::findOrfail($id);
    $priv=priv::all();
    return view('admin.users.edite',compact('priv','data_admin'));
   }
   public function update(Request $request,$id){

    // return $request ;
    admin::where("id",$id)->update([
        "name"=>$request->name,
        "email"=>$request->email,
        "gender"=>$request->gender,
        "priv"=>$request->priv
    ]);

    return redirect()->route("admin/index");
   }

   public function delete($id){

    // return admin::findOrfail($id);
    admin::where('id',$id)->delete();
    return redirect()->route("admin/index");
   }


   public function logout(){
      Auth::guard('admin')->logout();
     return view('admin.login');
   }

}
