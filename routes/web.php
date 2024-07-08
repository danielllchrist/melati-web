<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ManageLandingPageController;
use App\Http\Controllers\admin\EditProductController as AdminEditProductController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\customer\AddressController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\ChatController;
use App\Http\Controllers\customer\MixMatchController;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\customer\ProductController;
use App\Http\Controllers\customer\ReturnController;
use App\Http\Controllers\customer\ReviewController;
use App\Http\Controllers\customer\WishlistController;
use App\Http\Controllers\EditProductController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\shipping_service\OrderController as ShippingServiceOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route for All Users
Route::group([], function () {
    Route::get('/', [LandingPageController::class, 'index'])->name('landing');
    Route::controller(ProductController::class)->group(function () {
        Route::get('/katalog', 'index');
        Route::get('/katalog/{id}', 'detail_product');
    });

    Route::controller(MixMatchController::class)->group(function () {
        Route::get('/mix-and-match', 'index');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('/daftar', [RegisterController::class, 'index'])->name('daftar');
    Route::post('/daftar', [RegisterController::class, 'store']);
    Route::get('/masuk', [LoginController::class, 'index'])->name('masuk');
    Route::post('/masuk', [LoginController::class, 'authenticate']);
});

// Route for customer
Route::middleware(['auth'])->group(function () {
    Route::get('/profil', [UserController::class, 'profile']);
    Route::get('/keluar', [LoginController::class, 'logout']);
    // logout jangan lupa diganti jadi post
    Route::controller(ProductController::class)->group(function () {
        Route::get('/penilaian', 'review');
        Route::get('/pengembalian', 'return');
    });
    Route::controller(CartController::class)->group(function () {
        Route::get('/keranjang', 'index');
    });
    Route::controller(WishlistController::class)->group(function () {
        Route::get('/favorit', 'index');
    });
    Route::controller(ChatController::class)->group(function () {
        Route::get('/live-chat', 'chat');
    });

    //-------------- sidebar -------------------

    Route::controller(OrderController::class)->group(function () {
        Route::get('/pesanan', 'myorder');
        Route::get('/pesanan/{orderID}', 'detail_myorder');
        Route::get('/konfirmasi-pesanan', 'checkout');
        Route::get('/pembayaran', 'payment');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/profil', 'profile');
    });
    Route::resource('/alamat-saya', AddressController::class);
});

// Route for admin
Route::middleware(['admin'])->prefix('/admin')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin_dashboard');
    });
    Route::get('/profil', [UserController::class, 'profile']);
    Route::get('/keluar', [LoginController::class, 'logout']);
    // logout jangan lupa diganti jadi post
    Route::resource('/produk', AdminProductController::class);
    Route::get('/produk/kategori/{category}', [CategoryProductController::class, 'category'])->name('category');
    Route::get('/produk/buat_ukuran/{produk}', [AdminProductController::class, 'CreateSize'])->name('create_size');
    Route::post('/produk/simpan_ukuran/{id}', [AdminProductController::class, 'StoreSize'])->name('store_size');

    // Route::controller(AdminEditProductController::class)->group(function () {
    //     Route::get('/edit', 'index');
    // });

    Route::controller(ChatController::class)->group(function () {
        Route::get('/obrolan', 'chat');
    });

    Route::controller(UserController::class)->group(function () {
        Route::get('/profil', 'profile');
    });

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('adminStatus');
        Route::get('/pesanan/{orderID}', 'orderdetail')->name('adminPesanan');
        Route::post('/terima-pesanan', [OrderController::class, 'confirmOrder'])->name('confirmOrder');
        Route::post('/tolak-pesanan', [OrderController::class, 'rejectOrder'])->name('rejectOrder');
        Route::post('/kirim-pesanan', [OrderController::class, 'sendOrder'])->name('sendOrder');
    });

    Route::controller(ManageLandingPageController::class)->group(function () {
        Route::get('/atur', 'index');
        Route::get('/manajer-carousel', 'managecarousel');
        Route::post('/unggah-gambar/{id}', 'uploadImage')->name('upload.image');
        Route::delete('/hapus-gambar/{id}','deleteImage')->name('delete.image');

    });
});

// Route for shipping service
Route::middleware(['shipping_service'])->prefix('/shipping-service')->group(function () {
    Route::get('/', [ShippingServiceOrderController::class, 'index']);
    Route::get('/profil', [UserController::class, 'profile']);
    Route::get('/keluar', [LoginController::class, 'logout']);
    // logout jangan lupa diganti jadi post
    Route::get('/order/{orderID}', [ShippingServiceOrderController::class, 'orderdetail']);
});