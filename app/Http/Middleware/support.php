<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class support
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $priv_login=Auth::guard('admin')->user()->priv;
        $id_login=Auth::guard('admin')->user()->id;
        $id_url=$request->id;
        if($priv_login==300 || $priv_login==200 && $id_login==$id_url){

            return $next($request);
        }else{
            return redirect()->route("product/index");
        }
    }
}
