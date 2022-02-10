<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Models\Category;
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
Route::get('/help', [ContactController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'show'])->middleware('auth');
Route::get('/book/{id}', [BookController::class, 'show'])->middleware('auth');
Route::get('/cart', [RentController::class, 'index'])->middleware('auth');
Route::get('/account-maintanance', [AccountController::class, 'index'])->middleware('auth');
Route::get('/success', function(){
    return view('success',
    [
        'title' => "Success",
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');//tell laravel it's login
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::get('/rent/{book}', [RentController::class, 'rent'])->middleware('auth');
Route::delete('/rent/{id}', [RentController::class,'delete'])->name('rent.delete');
Route::post('/rent/submit', [RentController::class,'submit'])->name('rent.submit');

Route::post('/auth/register',[RegisterController::class,'register']);   
Route::post('/auth/login',[LoginController::class,'login']); 
Route::post('/auth/logout',[LoginController::class,'logout']);   
Route::post('/profile/edit', [ProfileController::class, 'edit']);

