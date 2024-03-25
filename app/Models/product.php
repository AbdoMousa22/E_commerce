<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable=[
        "name","price","sale","count","cat"
    ];

    public function images(){
    //    return $this->hasMany(image::class,'id','product_id');
       return $this->hasMany(image::class,"product_id","id");
    }

    public static function  edite($request,$id){
      return   product::where("id",$id)->update([
            "name"=>$request->name,
            "price"=>$request->price,
            "sale"=>$request->sale,
            "count"=>$request->count,
            "cat"=>$request->cat,
        ]);

    }


    public function users(){
        return $this->belongsToMany(User::class,"carts");
    }



}
