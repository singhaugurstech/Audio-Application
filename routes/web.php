<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\BookController;
use App\Http\Controllers\UI\CategoryController;
use App\Http\Controllers\UI\UserController;
use App\Http\Controllers\UI\AboutController;

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
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () { 

    Route::get('books',[BookController::class,'index']);
    Route::get('book/create',[BookController::class,'create']);
    Route::post('book/store',[BookController::class,'store']);
    Route::get('book/edit/{id}',[BookController::class,'edit']);
    Route::post('book/update',[BookController::class,'update']);
    Route::get('book/destroy/{id}',[BookController::class,'destroy']);


    Route::get('category',[CategoryController::class,'index']);
    Route::get('category/create',[CategoryController::class,'create']);
    Route::post('category/store',[CategoryController::class,'store']);
    Route::get('category/edit/{id}',[CategoryController::class,'edit']);
    Route::post('category/update',[CategoryController::class,'update']);
    Route::get('category/destroy/{id}',[CategoryController::class,'destroy']);


    Route::get('about',[AboutController::class,'index']);
    Route::get('about/create',[AboutController::class,'create']);
    Route::post('about/store',[AboutController::class,'store']);
    Route::get('about/edit/{id}',[AboutController::class,'edit']);
    Route::post('about/update',[AboutController::class,'update']);
    Route::get('about/destroy/{id}',[AboutController::class,'destroy']);


    Route::get('users',[UserController::class,'index']);

});


