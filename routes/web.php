<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
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
    return view('welcome');
});

Route::get('/register',[Authcontroller::class,'loadRegister']);
Route::post('/register',[Authcontroller::class,'studentRegister'])->name('studentRegister');

Route::get('/login',function(){
    return redirect('/');
});

Route::get('/',[Authcontroller::class,'loadLogin']);
Route::post('/login',[Authcontroller::class,'userlogin'])->name('userlogin');

Route::get('/logout',[ Authcontroller::class,'logout']);

Route::get('/dashboard',[Authcontroller::class,'loadDashboard']);
Route::get('/admin/dashboard',[Authcontroller::class,'adminDashboard']);
