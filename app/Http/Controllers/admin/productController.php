<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Models\category;
use App\Models\image;
use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
{



    public function index(){

       $id=1;
       $all_data=product::with('images')->get();

        return view('admin.products.view',compact('all_data','id'));
    }




    public function add(){
        $cat=  category::all();
        return view('admin.products.add',compact('cat'));
    }




     public function insert(Request $request){

        // return $request;
       $product=product::create([
            "name"=>$request->input("name"),
            "price"=>$request->input("price"),
            "sale"=>$request->input("sale"),
            "count"=>$request->input("count"),
            "cat"=>$request->input("cat")
        ]);

        foreach($request->img as $img){
               $ex=$img->getClientOriginalExtension();
               $new_name=md5(uniqid()).".".$ex;

               image::create([
                "product_id"=>$product->id,
                "image"=>$new_name
               ]);
               $img->move(storage_path('app/public/images'),$new_name);
        }

        return  redirect()->route('product/index');

    }




    public function edite($id){
        //   return $id;
        $cat=  category::all();
        $all_data=product::findOrfail($id);
        return view("admin.products.edite",compact("cat","all_data"));
    }



     public function update(Request $request,$id){

        // return $request;
        if(empty($request->img)){

             product::edite($request,$id);
            return redirect()->route('product/index');
        }else{
            image::delete_img($id);
            image::drop_img($id);
            image::creat_img($request,$id);
            product::edite($request,$id);
            return redirect()->route('product/index');


        }

     }


     public function delete($id){

         // return $id;
            image::delete_img($id);
            product::findOrfail($id)->delete();
            return redirect()->route('product/index');

     }

}
