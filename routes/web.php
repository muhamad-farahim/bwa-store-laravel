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
use App\Http\Controllers\CheckoutController;



use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductGalleryController;
use App\Http\Controllers\admin\TransactionController;
use App\Models\Transaction;
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
Route::post('/details/{id}', [DetailsController::class, 'add'])->name('details-add');

Route::get('/success', [CartsController::class, 'success'])->name('success');
Route::get('/register/success', [App\Http\Controllers\Auth\RegisterController::class, 'success'])->name('register-success');

Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
Route::get('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');



Route::prefix('admin')->name('admin.')->middleware('admin')
    ->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::resource('category', CategoryController::class);
        Route::resource('user', UserController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product-gallery', ProductGalleryController::class);
        Route::resource('transactions', TransactionController::class);
    });

Route::group(["middleware" => ['auth']], function () {

    Route::get('/cart', [CartsController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartsController::class, 'delete'])->name('cart-delete');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/product', [DashboardProductController::class, 'index'])->name('dashboard-product');
    Route::get('/dashboard/product/create', [DashboardProductController::class, 'create'])->name('dashboard-product-create');
    Route::get('/dashboard/product/{id}', [DashboardProductController::class, 'details'])->name('dashboard-product-details');
    Route::post('/dashboard/product/{id}', [DashboardProductController::class, 'update'])->name('dashboard-product-update');
    Route::post('/dashboard/product/', [DashboardProductController::class, 'store'])->name('dashboard-product-store');


    Route::post('/dashboard/gallery/upload', [DashboardProductController::class, 'uploadGallery'])->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/gallery/delete/{id}', [DashboardProductController::class, 'deleteGallery'])->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
    Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transactions-details');
    Route::post('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'update'])->name('dashboard-transactions-update');

    Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-setting-store');
    Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-setting-account');

    Route::get('/dashboard/account/{redirect}', [DashboardSettingController::class, 'update'])->name('dashboard-setting-redirect');
});


Auth::routes();