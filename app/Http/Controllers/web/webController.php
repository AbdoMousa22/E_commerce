<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\image;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class webController extends Controller
{


    public function index(){

       $products=product::with('images')->paginate(4);

        return view('web.index',compact("products"));
    }


 

     public function total_price(Request $request){

        $id_user=Auth::guard('web')->user()->id;
        $id_pro= cart::where('user_id',$id_user)->get("product_id");
        $count=cart::where('user_id',$id_user)->get('count');
        $price=product::whereIn('id',$id_pro)->get('price');

         $total=0;
         foreach ($count as $key => $count) {
          $total+=$count->count*$price[$key]['price'];
         }
         echo $total;

     }

}
