<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [HomeController::class,'index']);

Route::get('/contact', [ContactController::class, 'index']);

Route::get('/category/{category}', [CategoryController::class, 'show'])->middleware('auth');

Route::get('/book/{id}', [BookController::class, 'show'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');//tell laravel it's login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/auth/register',[RegisterController::class,'register']);   
Route::post('/auth/login',[LoginController::class,'login']);   