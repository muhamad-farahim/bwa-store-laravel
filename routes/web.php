<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CartsController;

// use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
Route::get('/details/{id}', [DetailsController::class, 'index'])->name('details');
Route::get('/cart', [CartsController::class, 'index'])->name('cart');
Route::get('/success', [CartsController::class, 'success'])->name('success');
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('success');
Auth::routes();

Route::get('/home', function(){
    return view('welcome');
})->name('home');