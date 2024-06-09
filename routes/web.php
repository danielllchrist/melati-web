<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for Customers' Page

Route::get('/', function () {
    return view('customer.landingpage');
});

Route::get('/keranjang', function () {
    return view('customer.cart');
});

Route::get('/katalog', function () {
    return view('customer.catalog');
});

Route::get('/wishlist', function () {
    return view('customer.wishlist');
});

Route::get('/mixmatch', function () {
    return view('customer.mixmatch');
});

Route::get('/detail', function () {
    return view('customer.detail');
});

Route::get('/pesanan-saya', function () {
    return view('customer.myorder');
});

Route::get('/konfirmasi-pesanan', function () {
    return view('customer.checkout');
});

Route::get('/daftar', function () {
    return view('customer.register');
});

Route::get('/masuk', function () {
    return view('customer.login');
});

Route::get('/profil', function () {
    return view('customer.profile');
});

Route::get('/penilaian', function () {
    return view('customer.review');
});

Route::get('/detil-pesanan', function () {
    return view('customer.orderdetail');
});

Route::get('/pengembalian-barang', function () {
    return view('customer.return');
});

Route::get('/test', function () {
    return view('customer.test');
});

Route::get('/customer-chat', function () {
    return view('customer.chat');
});

Route::get('/pembayaran', function () {
    return view('customer.payment');
});

Route::get('/tambah-alamat', function () {
    return view('customer.addaddres');
});

// Route for Admins' Page
Route::get('/admin-chat', function () {
    return view('admin.chat');
});

Route::get('/order-status', function(){
    return view('admin.orderstatus');
});

Route::get('/admindashboard', function () {
    return view('admin.admindashboard');
});

// Route for Shipping Services' Page

Route::get('/order-status-section', function(){
    return view('shipping_service.orderstatus');
});
