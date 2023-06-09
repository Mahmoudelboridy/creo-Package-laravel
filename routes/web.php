<?php

use App\Http\Controllers\authcontroller;
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
})->middleware('nowlogin');
Route::get('signup',[authcontroller::class,'signup'])->middleware('nowlogin');
Route::post('/signup',[authcontroller::class,'sign_up'])->name('signup');
Route::get('login',[authcontroller::class,'login'])->middleware('nowlogin');
Route::post('/login',[authcontroller::class,'log_in'])->name('login');

Route::get('/forget',[authcontroller::class,'forget'])->middleware('nowlogin')->name('forget');
Route::post('forget',[authcontroller::class,'for_get'])->name('for_get');
Route::get('/change',[authcontroller::class,'change'])->middleware('nowlogin')->name('change');
Route::post('change',[authcontroller::class,'cha_nge'])->name('cha_nge');




Route::get('/admin',[authController::class,'admin'])->middleware('checklogin');
Route::get('/vendor',[authController::class,'vendor'])->middleware('checklogin');
Route::get('/user',[authController::class,'user'])->middleware('checklogin');
Route::get('/acticode',[authController::class,'acticode'])->middleware('checklogin');
Route::post('/acticode',[authController::class,'acti'])->name('acti');
Route::get('/logout',[authController::class,'logout']);