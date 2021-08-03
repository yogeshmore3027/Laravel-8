<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:sanctum'], function(){
//    Stud Controller
    Route::get("info",[StudController::class,'index']);
    Route::post("create",[StudController::class,'create']);
    Route::get("edit",[StudController::class,'edit']);
    Route::get("delete",[StudController::class,'delete']);

    // Product Controller
    Route::get("productinfo", [ProductController::class,'index']);
    Route::post("productcreate",[ProductController::class,'create']);
    Route::get("productedit",[ProductController::class,'edit']);
    Route::get("productdelete",[ProductController::class,'destroy']);

    // Book Controller
    Route::get("bookinfo",[BookController::class,'index']);
    Route::get("bookcreate",[BookController::class,'create']);
    Route::get("bookedit",[BookController::class,'edit']);
    Route::get("bookdelete",[BookController::class,'delete']);

    // Os Controller
    Route::get("osinfo",[OsController::class,'index']);
    Route::get("oscreate",[OsController::class,'create']);
    Route::get("osedit",[OsController::class,'edit']);
    Route::get("osdelete",[OsController::class,'delete']);
   
    // Bike Controller

    Route::get("bikeinfo",[BikeController::class,'index']);
    Route::get("bikecreate",[BikeController::class,'create']);
    Route::get("bikeedit",[BikeController::class,'edit']);
    Route::get("bikedelete", [BikeController::class,'delete']);


// });


