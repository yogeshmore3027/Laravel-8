<?php

use App\Http\Controllers\BikeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
}); 

// Route::get("/stud",[StudController::class,'index']);
// Route::post("index",[StudController::class,'store']);

// Route::post('index', [StudController::class, 'store'])->name('store');

Route::resource('employees', EmployeeController::class);

Route::resource('stud', StudController::class);

Route::resource('bike', BikeController::class);
Route::get('bike-update/{id}', [BikeController::class,'show']);
Route::get('bike-delete/{id}', [BikeController::class,'delete']);










// Route::get('/about', function () {
//     return "Yogesh More";
// });
