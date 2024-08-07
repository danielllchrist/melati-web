<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\ManageLandingPageController as AdminManageLandingPageController;
use App\Http\Controllers\admin\OrderController as AdminOrderController;
use App\Http\Controllers\admin\ProductController as AdminProductController;
use App\Http\Controllers\admin\CategoryProductController as AdminCategoryProductController;
use App\Http\Controllers\admin\ChatController as AdminChatController;
use App\Http\Controllers\customer\AddressController as CustomerAddressController;
use App\Http\Controllers\customer\CartController as CustomerCartController;
use App\Http\Controllers\customer\ChatController as CustomerChatController;
use App\Http\Controllers\customer\MixMatchController as CustomerMixMatchController;
use App\Http\Controllers\customer\OrderController as CustomerOrderController;
use App\Http\Controllers\customer\ReviewController as CustomerReviewController;
use App\Http\Controllers\customer\ReturnController as CustomerReturnController;
use App\Http\Controllers\customer\ProductController as CustomerProductController;
use App\Http\Controllers\customer\WishlistController as CustomerWishlistController;
use App\Http\Controllers\shipping_service\OrderController as ShippingServiceOrderController;
use App\Livewire\AdminChat;
use App\Livewire\Chat;
use App\Livewire\CustomerChat;
use Illuminate\Support\Facades\Route;

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

// Route for all user
Route::group([], function () {
    Route::controller(LandingPageController::class)->group(function () {
        Route::get('', 'index')->name('LandingPage');
    });
    Route::controller(CustomerProductController::class)->group(function () {
        Route::get('/katalog', 'product')->name('Catalogue');
        Route::get('/katalog?gender=wanita', 'women_catalogue')->name('WomenCatalogue');
        Route::get('/katalog?gender=pria', 'men_catalogue')->name('MenCatalogue');
        Route::get('/produk/{id}', 'detail_product')->name('ProductDetail');
        Route::get('/filter/{filterType}', 'filter')->name('Filter');
        Route::post('/wish', 'wish')->name('wish');
        Route::post('/unwish', 'unwish')->name('unwish');
        Route::get('/get_stock/{productID}/{size}', 'get_stock')->name('get_stock');
        Route::post('/add_cart', 'add_cart')->name('add_cart');
    });
    Route::controller(CustomerMixMatchController::class)->group(function () {
        Route::get('/mix-and-match', 'index')->name('MixMatch');
        Route::get('/ambil-produk/{category}', 'searchProductAjax');
        Route::get('/ambil-produk-modal/{card}', 'getProductAjax')->name('getProduct');
        Route::get('/tampilkan-gambar/{productID}', 'getImageURL')->name('getImageURL');
    });
});

// Route for guest
Route::middleware(['guest'])->group(function () {
    Route::get('/daftar', [RegisterController::class, 'index'])->name('Register');
    Route::post('/daftar', [RegisterController::class, 'store'])->name('Registers');
    Route::get('/masuk', [LoginController::class, 'index'])->name('LogIn');
    Route::post('/masuk', [LoginController::class, 'authenticate'])->name('LogIns');
});

// Route for customer
Route::middleware(['customer'])->group(function () {
    Route::prefix('/profil')->controller(UserController::class)->group(function () {
        Route::get('', 'profile')->name('CustomerProfile');
        Route::post('/perbarui-profil', 'update_profile')->name('CustomerUpdateProfile');
        Route::post('/perbarui-kata-sandi', 'update_password')->name('CustomerUpdatePassword');
        Route::post('/perbarui-gambar-profil', 'update_profile_picture')->name('CustomerUpdateProfilePicture');
    });
    Route::controller(LoginController::class)->group(function () {
        Route::post('/keluar', 'logout')->name('CustomerLogOut');
    });

    Route::controller(CustomerReviewController::class)->group(function () {
        Route::get('/penilaian/{transactionID}/{productID}', 'create')->name('review.create');
        Route::post('/penilaian/{transactionID}/{productID}', 'store')->name('review.store');
        // Route::get('/penilaian', 'index')->name('review.index');
    });

    Route::controller(CustomerReturnController::class)->group(function () {
        Route::get('/pengembalian/{transactionID}', 'index')->name('CustomerReturn');
        Route::post('/pengembalian/{transactionID}', 'store')->name('CustomerReturn.store');
    });

    Route::controller(CustomerMixMatchController::class)->group(function () {
        Route::post('/mix-and-match/tambah-keranjang', 'addCart')->name('addCart');
    });

    Route::controller(CustomerCartController::class)->group(function () {
        Route::get('/keranjang', 'index')->name('CustomerCart');
        Route::delete('/keranjang/delete/{id}', 'destroy')->name('keranjang.destroy');
        Route::put('/keranjang/update/{id}', 'update')->name('keranjang.update');
        // Route::put('/update-product-size/{product}', 'ProductController@updateSize')->name('update-product-size');
        Route::post('/keranjang/buat-pesanan', 'store')->name('keranjang.store');
    });
    Route::controller(CustomerWishlistController::class)->group(function () {
        Route::get('/favorit', 'product')->name('CustomerWishlist');
    });
    // Route::controller(CustomerChat::class)->group(function () {
    //     Route::get('/obrolan', 'chat')->name('CustomerChat');
    // });
    Route::get('/obrolan', CustomerChat::class)->name("CustomerChat");

    Route::controller(CustomerOrderController::class)->group(function () {
        Route::get('/pesanan-saya', 'myorder')->name('CustomerMyOrder');
        Route::get('/pesanan-saya/{orderID}', 'detail_myorder')->name('CustomerDetailOrder');
        Route::post('/batalkan-pesanan', 'cancelOrder')->name('CustomerCancelOrder');
        Route::post('/menerima-pesanan', 'accOrder')->name('CustomerAcceptOrder');
        Route::post('/mengembalikan-pesanan', 'returnorder')->name('CustomerReturnOrder');
        Route::get('/konfirmasi-pesanan/{transactionID}', 'checkout')->name('CustomerConfirmOrder');
        Route::get('/getRegencies/{provinsi_id}', 'getRegencies');
        Route::get('/getDistricts/{kota_id}', 'getDistricts');
        Route::get('/konfirmasi-pesanan/{transactionID}/{voucherID}', 'useVoucher')->name('UseVoucher');
        Route::post('/tambah-alamat', 'addAddress')->name('AddAddress');
        Route::post('/pembayaran/{transactionID}/bayar', 'pay')->name('PayOrder');
        Route::post('/pembayaran/{transactionID}/batal', 'cancel')->name('CancelOrder');
        Route::post('/pembayaran/{transactionID}/{tempTotalPrice?}/{voucherID?}', 'payment')->name('prepayment');
    });
    // Route::resource('addresses', CustomerAddressController::class)->except(['index']);
    Route::controller(CustomerAddressController::class)->group(function () {
        Route::get('/alamat-saya', 'index')->name('alamat-saya.index');
        Route::post('/simpan-alamat', 'store')->name('simpan-alamat');
        Route::get('/getRegencies/{provinsi_id}', 'getRegencies');
        Route::get('/getDistricts/{kota_id}', 'getDistricts');
        Route::get('/getAddress/{id}', 'getAddress')->name('get-address');
        Route::put('/updateAddress/{id}', 'updateAddress')->name('update-address');
    });
});

// Route for admin
Route::middleware(['admin'])->prefix('/admin')->group(function () {
    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/', 'index')->name('AdminDashboard');
    });
    Route::prefix('/profil')->controller(UserController::class)->group(function () {
        Route::get('', 'profile')->name('AdminProfile');
        Route::post('/perbarui-profil', 'update_profile')->name('AdminUpdateProfile');
        Route::post('/perbarui-kata-sandi', 'update_password')->name('AdminUpdatePassword');
        Route::post('/perbarui-gambar-profil', 'update_profile_picture')->name('AdminUpdateProfilePicture');
    });
    Route::controller(LoginController::class)->group(function () {
        Route::post('/keluar', 'logout')->name('AdminLogOut');
    });
    Route::controller(AdminCategoryProductController::class)->group(function () {
        Route::get('/produk/kategori/{category}', 'category')->name('Category');
    });
    Route::controller(AdminProductController::class)->group(function () {
        Route::get('/produk/buat_ukuran/{produk}', 'createsize')->name('CreateSize');
        Route::post('/produk/simpan_ukuran/{id}', 'storesize')->name('StoreSize');
    });
    Route::resource('/produk', AdminProductController::class);
    // Route::controller(AdminChatController::class)->group(function () {
    //     Route::get('/obrolan', 'chat')->name('AdminChat');
    // });
    Route::get('/obrolan', AdminChat::class)->name("AdminChat");

    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/pesanan', 'index')->name('AdminStatus');
        Route::get('/pesanan/{orderID}', 'orderdetail')->name('AdminOrder');
        Route::post('/terima-pesanan', 'confirmorder')->name('AdminConfirmOrder');
        Route::post('/tolak-pesanan', 'rejectorder')->name('AdminRejectOrder');
        Route::post('/kirim-pesanan', 'sendorder')->name('AdminSendOrder');
    });
    Route::controller(AdminManageLandingPageController::class)->group(function () {
        Route::get('/atur', 'Index')->name('ManageLandingPage');
        Route::get('/manajer-carousel', 'managecarousel')->name('ManageCarousel');
        Route::post('/unggah-gambar/{id}', 'uploadImage')->name('UploadImage');
        Route::delete('/hapus-gambar/{id}', 'deleteImage')->name('DeleteImage');
    });
});

// Route for shipping service
Route::middleware(['shipping_service'])->prefix('/shipping-service')->group(function () {
    Route::controller(ShippingServiceOrderController::class)->group(function () {
        Route::get('/', 'index')->name('ShippingServiceDashboard');
        Route::get('/order/{orderID}', 'orderdetail')->name('ShippingServiceOrder');
        Route::get('/orderstatus', 'index')->name('orderstatus');
        Route::post('/kirim-pesanan', 'sendorder')->name('ShippingServiceSendOrder');
        Route::post('/pesanan-tiba', 'doneorder')->name('ShippingServiceDoneOrder');
    });
    Route::prefix('/profil')->controller(UserController::class)->group(function () {
        Route::get('', 'profile')->name('ShippingServiceProfile');
        Route::post('/perbarui-profil', 'update_profile')->name('ShippingServiceUpdateProfile');
        Route::post('/perbarui-kata-sandi', 'update_password')->name('ShippingServiceUpdatePassword');
        Route::post('/perbarui-gambar-profil', 'update_profile_picture')->name('ShippingServiceUpdateProfilePicture');
    });
    Route::controller(LoginController::class)->group(function () {
        Route::post('/keluar', 'logout')->name('ShippingServiceLogOut');
    });
});
