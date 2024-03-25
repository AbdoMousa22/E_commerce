<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;
    protected $fillable=[
        "product_id","image"
    ];

    public function product(){

      return  $this->belongsTo(product::class,"id","product_id");

    }

    public static function delete_img($id){
        $img=image::where("product_id",$id)->get();
        foreach($img as $file){
        //  echo "<br>".$file->image;
        unlink(storage_path()."/app/public/images/".$file->image);
        }

     }

     public static function drop_img($id){

        image::where("product_id",$id)->delete();
     }


     public static function creat_img($request,$id){
        foreach($request->img as $img){
            $ex=$img->getClientOriginalExtension();
            $new_name=md5(uniqid()).".".$ex;

         //    print_r($new_name) ;

            image::create([
             "product_id"=>$id,
             "image"=>$new_name
            ]);
            $img->move(storage_path('app/public/images'),$new_name);
     }



     }




}
