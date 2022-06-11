<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardSettingController;


use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/product', [DashboardProductController::class, 'index'])->name('dashboard-product');
Route::get('/dashboard/product/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
Route::get('/dashboard/product/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-details');

Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transactions-details');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-setting-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-account');

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])
->group(function(){
    Route::get('/', [DashboardController::class], 'index')->name('admin-dashboard');
});



Auth::routes();

Route::get('/home', function(){
    return view('welcome');
})->name('home');