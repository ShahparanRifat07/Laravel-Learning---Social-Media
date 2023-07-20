<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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



//Authentication Routes
Route::any('register/',[UserController::class,'register'])->name('register');
Route::any('login/',[UserController::class,'login'])->name('login');
Route::post('logout/',[UserController::class,'logout'])->name('logout');


//Post Routes
Route::get('/',[PostController::class,'index'])->name('home');
Route::match(['get', 'post'], 'post/create/',[PostController::class,'create'])->name('create-post')->middleware('auth');
Route::get('post/{id}',[PostController::class,'detail'])->name('post-detail');
Route::match(['get', 'post','patch'], 'post/edit/{post_id}',[PostController::class,'edit'])->name('edit-post')->middleware('auth');
Route::match(['delete'], 'post/delete/{post}',[PostController::class,'delete'])->name('delete-post')->middleware('auth');

