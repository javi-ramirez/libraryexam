<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoansController;
use App\Http\Controllers\LiteraryGenreController;
use App\Models\Book;

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
    return view('auth.login');
});

Route::get('authlogin',[UserController::class,'index']);
Route::post('btnValidateLogin',[AdminController::class,'validateUser']);
Route::get('admin/btnLogout',[AdminController::class,'logOut']);

Route::get('admin/dashboard',[AdminController::class,'index']);

Route::get('admin/books',[BookController::class,'index']);
Route::post('admin/btnAddBook',[BookController::class,'create']);

Route::get('admin/loans',[LoansController::class,'index']);

Route::get('admin/categories',[CategoryController::class,'index']);
Route::get('admin/getListCategories',[CategoryController::class,'show']);

Route::get('admin/users',[UserController::class,'viewUsers']);


/*Route::resource('auth',UserController::class);
Route::resource('admin',AdminController::class);
Route::resource('book',BookController::class);
Route::resource('category',CategoryController::class);
Route::resource('loans',LoansController::class);
Route::resource('literary',LiteraryGenreController::class);*/