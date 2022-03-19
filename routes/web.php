<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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


Route::get("/",[HomeController::class,"index"]);
Route::get("/redirects",[HomeController::class,"redirects"]);
#user
Route::get('/users',[AdminController::class,'users']);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteuser"]);

#food
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::post("/uploadfood",[AdminController::class,"upload"]);
Route::get("/updateview/{id}",[AdminController::class,"updateview"]);
Route::post("/update/{id}",[AdminController::class,"update"]);

#reservation
Route::post("/reservation",[AdminController::class,"reservation"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);

#chef
Route::get("/viewchef",[AdminController::class,"viewchef"]);
Route::post("/uploadchef",[AdminController::class,"uploadchef"]);
Route::get("/updatechef/{id}",[AdminController::class,"updatechef"]);
Route::post("/updatefoodchef/{id}",[AdminController::class,"updatefoodchef"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);

#cart
Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::get("/showcart/{id}",[HomeController::class,"showcart"]);
Route::get("/remove/{id}",[HomeController::class,"remove"]);

#order
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
