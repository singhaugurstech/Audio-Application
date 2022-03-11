<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UI\BookController;
use App\Http\Controllers\UI\CategoryController;
use App\Http\Controllers\UI\UserController;
use App\Http\Controllers\UI\AboutController;
use App\Http\Controllers\UI\ContactController;
use App\Http\Controllers\UI\AdvertisementController;

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

    Route::get('contact',[ContactController::class,'index']);
    Route::get('contact/create',[ContactController::class,'create']);
    Route::post('contact/store',[ContactController::class,'store']);
    Route::get('contact/edit/{id}',[ContactController::class,'edit']);
    Route::post('contact/update',[ContactController::class,'update']);
    Route::get('contact/destroy/{id}',[ContactController::class,'destroy']);

    Route::get('advertisement',[AdvertisementController::class,'index']);
    Route::get('advertisement/create',[AdvertisementController::class,'create']);
    Route::post('advertisement/store',[AdvertisementController::class,'store']);
    Route::get('advertisement/edit/{id}',[AdvertisementController::class,'edit']);
    Route::post('advertisement/update',[AdvertisementController::class,'update']);
    Route::get('advertisement/destroy/{id}',[AdvertisementController::class,'destroy']);


    Route::get('users',[UserController::class,'index']);
    Route::get('profile',[UserController::class,'profile']);
    Route::post('edit_profile',[UserController::class,'editProfile']);

});


