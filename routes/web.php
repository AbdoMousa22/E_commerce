<?php

use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\web\ajaxController;
use App\Http\Controllers\web\registerController;
use App\Http\Controllers\web\webController;
use App\Http\Controllers\web\webloginController;
use App\Http\Controllers\web\webLonginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    // return view('web/login');
  return  redirect()->route('web/index');
});






Route::controller(webController::class)->group(function(){
    Route::get('index','index')->name('web/index');
    Route::get('cart','cart')->name('web/cart');



    Route::post('total_price','total_price')->name('web/total_price');


});
Route::controller(registerController::class)->group(function(){
    Route::get('web/register','web_register')->name('web/register');
    Route::post('web/data_register','data_register')->name('web/data_register');
    // Route::get('view_cart','view_cart')->name('webs/view_cart');
    });


Route::controller(webLonginController::class)->group(function(){
    Route::get('web/login','login')->name('web/login');
    Route::post('web/data','data')->name('web/data');
    Route::get('web/logout','logout')->name('web/logout');



});

Route::controller(ajaxController::class)->group(function(){
    Route::post('web/data_ajax','data_ajax')->name('web/data_ajax');
    Route::get("web/delete_cart","delete_cart")->name("web/delete_cart");
    Route::post('search','search')->name('web/search');
    Route::post('web/all_count','all_count')->name('web/all_count');




});




