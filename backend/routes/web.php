<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SaveController;

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

Route::get('tweets/store/create',[SaveController::class,'sinki']);
Route::get('tweets/list',[HelloController::class,'list']);

Route::get('tweets/index',[HelloController::class,'index']);
Route::get('tweets/hasmany',[RecordController::class,'hasmany']);

Route::get('save/create',[SaveController::class,'create']);
Route::post('save/store',[SaveController::class,'store']);


Route::get('save/{id}/edit',[SaveController::class,'edit']);
Route::patch('save/{id}',[SaveController::class,'update']);

Route::get('save/{id}',[SaveController::class,'show']);
Route::delete('save/{id}/',[SaveController::class,'destroy']);




Route::get('/', function () {
    return view('welcome');
});
