<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\image;
use App\Models\product;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class data_cart extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        view()->composer("*",function($view){
            if(Auth::guard('web')->check()){
            $id_user=Auth::guard('web')->user()->id;
            $data_cart=User::findOrfail($id_user)->with("products")->get()[0]["products"];
            $id_product=cart::where('user_id',$id_user)->get("product_id");
            $product_count=cart::where('user_id',$id_user)->get("count");
            $all_image=image::whereIn('product_id',$id_product)->get();



            $view->with(["data_cart"=>$data_cart,"all_image"=>$all_image,"product_count"=>$product_count]);
            }
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
