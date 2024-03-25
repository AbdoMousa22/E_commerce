<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class data_login extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         view()->composer("*",function($view){
            if(Auth::guard('admin')->check()){

                $priv_login = Auth::guard('admin')->user()->priv;
                $id_login   = Auth::guard('admin')->user()->id;
                $name_login   = Auth::guard('admin')->user()->name;

                $view->with(["priv_login"=>$priv_login,"id_login"=>$id_login,"name_login"=>$name_login]);
            }
         });
    }
}
