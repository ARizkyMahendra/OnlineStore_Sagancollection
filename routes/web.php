<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

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

Route::get('/', [TransactionController::class, 'index'])->name('home');
Route::post('/addToCart', [TransactionController::class, 'addToCart'])->name('addtocart');


Route::get('/shop', [Controller::class, 'shop'])->name('shop');
Route::get('/transaksi', [Controller::class, 'transaksi'])->name('transaksi');
Route::get('/contact', [Controller::class, 'contact'])->name('contact');
Route::get('/checkout', [Controller::class, 'checkout'])->name('checkout');

Route::post('/checkout/product/{id}', [Controller::class, 'checkoutProses'])->name('checkout.product');
Route::post('/checkout/payment', [Controller::class, 'payment'])->name('checkout.payment');

Route::get('/admin', [Controller::class, 'login'])->name('login');
Route::post('/admin/loginProses', [Controller::class, 'loginProses'])->name('loginProses');

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [Controller::class, 'admin'])->name('admin');
    Route::get('/admin/report', [Controller::class, 'report'])->name('report');
    Route::get('/admin/logout', [Controller::class, 'logout'])->name('logout');

    Route::get('/admin/product', [ProductController::class, 'index'])->name('product');
    Route::get('/admin/addModal', [ProductController::class, 'addModal'])->name('addModal');
    Route::post('/admin/addData', [ProductController::class, 'store'])->name('addData');
    Route::get('/admin/editModal/{id}', [ProductController::class, 'edit'])->name('editModal');
    Route::put('/admin/updateData/{id}', [ProductController::class, 'update'])->name('updateData');
    Route::delete('/admin/deleteData/{id}', [ProductController::class, 'destroy'])->name('deleteData');

    Route::get('/admin/user_management', [UserController::class, 'index'])->name('userManagement');
    Route::get('/admin/addModalUser', [UserController::class, 'addModalUser'])->name('addModal.user');
    Route::post('/admin/addUser', [UserController::class, 'store'])->name('userManagement.add');
    Route::get('/admin/editUser/{id}', [UserController::class, 'edit'])->name('userManagement.edit');
    Route::put('/admin/updateUser/{id}', [UserController::class, 'update'])->name('userManagement.update');
    Route::delete('/admin/deleteUser/{id}', [UserController::class, 'destroy'])->name('userManagement.destroy');
});

