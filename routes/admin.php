<?php

use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\productController;
use App\Http\Controllers\admin\userController;
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


Route::controller(userController::class)->middleware('AuthAdmin')->group(function(){

    Route::get("admin/index","index")->name('admin/index');
    Route::get("admin/add","add")->name('admin/add');
    Route::post("admin/insert","insert")->name('admin/insert');
    Route::get("admin/edite/{id}","edite")->name('admin/edite');
    Route::post("admin/update/{id}","update")->name('admin/update');
    Route::get("admin/delete/{id}","delete")->name('admin/delete');
    Route::get("logout","logout")->name('admin/logout');


});

Route::controller(productController::class)->middleware('AuthAdmin')->group(function(){
    Route::get("product/index","index")->name("product/index");
    Route::get("product/add","add")->name("product/add");
    Route::post("product/insert","insert")->name("product/insert");
    Route::get("product/edite/{id}","edite")->name("product/edite");
    Route::post("product/update/{id}","update")->name("product/update");
    Route::get("product/delete/{id}","delete")->name("product/delete");
});

Route::controller(loginController::class)->middleware('guest:admin')->group(function(){
    Route::get("admin/login","login")->name("admin/login");
    Route::post("admin/data","data")->name("admin/data");
});
