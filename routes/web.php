<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransferController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class,'index'])->name('home');
Route::get('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/game/{id}',[App\Http\Controllers\HomeController::class,'toProd'])->name('toProd');
Route::get('/home/profile',[App\Http\Controllers\HomeController::class,'toProfile'])->name('toProfile');
Route::get('/home/request',[App\Http\Controllers\HomeController::class,'toRequest']);
Route::get('/home/myitem',[App\Http\Controllers\HomeController::class,'toitem']);
Route::get('/home/profile/editprofile',[App\Http\Controllers\HomeController::class,'toEditProfile']);

Route::get('/admin/adminTopup',[App\Http\Controllers\HomeController::class,'toadminTopUp'])->middleware('is_admin');
Route::get('/admin/adminTopupHistory',[App\Http\Controllers\HomeController::class,'toadminTopuphis'])->middleware('is_admin');
Route::get('/admin/addCode',[App\Http\Controllers\HomeController::class,'adminAddPro'])->middleware('is_admin');
Route::get('/admin/addCode/{id}',[App\Http\Controllers\HomeController::class,'adminCode'])->middleware('is_admin');
Route::get('/admin/addGame',[App\Http\Controllers\HomeController::class,'adminAddGame'])->middleware('is_admin');

Route::get('/admin/topup/approve/{id}',[HomeController::class,'toApprove']);
Route::get('/admin/topup/deny/{id}',[HomeController::class,'toDeny']);
Route::get('/admin/code/add/{id}',[HomeController::class,'toAdd']);

Route::get('/home/product/{id}',[HomeController::class,'toProduct']);


Route::post('/home/product/doBuy',[App\Http\Controllers\TransferController::class,'doBuy']);
Route::post('/admin/saveGameAdd',[App\Http\Controllers\TransferController::class,'doAddGame'])->middleware('is_admin');
Route::get('/admin/delGame/{id}',[TransferController::class,'doDelGame'])->middleware('is_admin');
Route::get('/admin/code/delProd/{id}',[TransferController::class,'doDelProd'])->middleware('is_admin');

Route::post('/con/editpro',[App\Http\Controllers\TransferController::class,'doEditProfile']);


Route::post('/admin/topup/approve/con',[App\Http\Controllers\TransferController::class,'balanceIncrement'])->middleware('is_admin');
Route::post('/admin/code/doAdd',[App\Http\Controllers\TransferController::class,'doAdd'])->middleware('is_admin');
Route::get('/admin/code/doDel/{id}',[App\Http\Controllers\TransferController::class,'doDel'])->middleware('is_admin');
Route::post('/admin/code/doAddPro',[App\Http\Controllers\TransferController::class,'doAddPro'])->middleware('is_admin');

Route::post('/admin/topup/deny/con',[App\Http\Controllers\TransferController::class,'denyReq'])->middleware('is_admin');
Route::post('/home/savereq',[App\Http\Controllers\TransferController::class,'saveReq']);


