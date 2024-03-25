<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\image;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ajaxController extends Controller
{
    public function data_ajax(Request $request)
    {
        // return "$request";
     if(Auth::guard('web')->check()){

         $id_user=Auth::guard('web')->user()->id;
         $cart_found=cart::where("user_id",$id_user)->where("product_id",$request->product_id)->first();

         if($cart_found){
           $cart_found->increment("count");
         }else{
           $cart=new Cart();
           $cart->user_id=$id_user;
           $cart->product_id=$request->product_id;
           $cart->count=1;
           $cart->save();
         }


        }


    }

    public function delete_cart(Request $request)
    {
      $id_user=Auth::guard("web")->user()->id;
    //   return $request->id_product;
      cart::where("user_id",$id_user)->where("product_id",$request->id_product)->delete();
      return "yes";
    }


public function search(Request $request){
// return $request;
if(empty($request->search)){
    echo"";
}

else{
$search= product::where("name","LIKE","%$request->search%")->get();
foreach($search as $search){
echo  " <div> <a> $search->name </a> </div>";
}}

}

public function all_count(){
    $id_user=Auth::guard('web')->user()->id;

    $all_count=cart::where('user_id',$id_user)->get()->count();
    return $all_count;
}



}
