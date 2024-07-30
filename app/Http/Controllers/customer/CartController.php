<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function view()
    {
        return response()->view('customer.cart');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Mendapatkan user ID yang sedang login
        $carts = Cart::where('userID', $userId)->with(['size.product', 'size'])->orderBy('updated_at', 'asc')->get();
        $sizes = Size::all(); // Mengambil semua ukuran
        $addressExists = Address::where('userID', $userId)->exists();
        $carts = Cart::where('userID', auth()->user()->userID)->get();
        // dd($sizes);
        // Menghitung total harga
        $total = $carts->sum(function ($cart) {
            return $cart->size->product->productPrice * $cart->quantity;
        });

        return view('customer.cart', compact('carts', 'total', 'sizes', 'addressExists', 'carts'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        $userId = Auth::id();
        $cart = Cart::where('userID', $userId)->where('sizeID', $id)->first();

        if ($cart) {
            $cart->delete();
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan di keranjang.'], 404);
        }
    }

    public function update(Request $request, $id){
        Log::info('Request data:', $request->all());
        $userId = Auth::id();
        $cartUser = Cart::where('userID', $userId)->get();
        $cart = Cart::where('userID', $userId)->where('sizeID', $id)->first();
        $quantity = $cart->quantity;
        $oldSizeID = $cart->sizeID;
        Log::info($cart);

        if ($cart) {
            // Mengambil data sizeID baru dari request
            $newSizeID = $request->input('newSizeID');
            $newQuantity = $request->input('quantity');

            Log::info('New Size ID: ' . $newSizeID);
            Log::info('New Quantity: ' . $newQuantity);

            if ($newQuantity) {
                Log::info("Updating quantity");
                if ($newQuantity <= 0) {
                    return response()->json(['success' => false, 'message' => 'Quantity harus lebih besar dari 0.'], 400);
                }
                $cart->quantity = $newQuantity;
            } else if ($newSizeID) {
               Log::info("Updating size");

                // Periksa apakah newSizeID sudah ada di cartUser
                $existingCart = $cartUser->where('sizeID', $newSizeID)->first();
                if ($existingCart) {
                    // Tambahkan quantity dari $existingCart + $quantity kemudian save
                    $newQuantity = $existingCart->quantity + $quantity;
                    $updateQuery = "UPDATE carts SET quantity = ? WHERE userID = ? AND sizeID = ?";
                    DB::update($updateQuery, [$newQuantity, $userId, $newSizeID]);

                    // Hapus cart lama
                    $deleteQuery = "DELETE FROM carts WHERE userID = ? AND sizeID = ? AND quantity = ?";
                    DB::delete($deleteQuery, [$userId, $oldSizeID, $quantity]);

                    return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
                }

                // Lanjutkan dengan operasi DELETE dan INSERT
                $deleteQuery = "DELETE FROM carts WHERE userID = ? AND sizeID = ? AND quantity = ?";
                DB::delete($deleteQuery, [$userId, $oldSizeID, $quantity]);
                $insertQuery = "INSERT INTO carts (userID, sizeID, quantity) VALUES (?, ?, ?)";
                DB::insert($insertQuery, [$userId, $newSizeID, $quantity]);            
            }

            $cart->save();
            Log::info($cart);

            return response()->json(['success' => true, 'message' => 'Cart updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Cart not found'], 404);
        }

    }

    public function store(Request $request)
    {
        try {
            $userId = Auth::id();

            // Periksa apakah pengguna memiliki alamat yang terdaftar
            $addressExists = Address::where('userID', $userId)->exists();
            // if (!$addressExists) {
            //     return redirect()->route('CustomerMyOrder')->with('showPopup', true);
            // }

            $products = $request->input('products');
            $totalPrice = $request->input('totalPrice');

            $count = Transaction::count();

            // Buat transaksi baru
            $transaction = new Transaction();
            $transaction->userID = $userId;
            $transaction->subTotalPrice = $totalPrice;
            $transaction->statusID = 1;

            if ($count > 0) {
                $transaction->transactionID = $count + 1;
            } else {
                $transaction->transactionID = 1;
            }
            $transaction->save();

            // Buat detail transaksi untuk setiap item di keranjang
            foreach ($products as $product) {
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transactionID = $transaction->transactionID;
                $transactionDetail->sizeID = $product['sizeID'];

                // Ambil productID berdasarkan sizeID dari tabel sizes
                $size = Size::find($product['sizeID']);

                if ($size) {
                    //buatkan validasi disini, jika sizeID 

                    $transactionDetail->productID = $size->productID;

                    // Ambil informasi produk berdasarkan productID
                    $productInfo = Product::find($size->productID);

                    if ($productInfo) {

                        // Kurangi stok produk
                        $newStock = $size->stock - $product['quantity'];

                        // Pastikan stok tidak kurang dari 0
                        if ($newStock < 0) {
                            throw new \Exception('Stok produk ' . $productInfo->productName . ' tidak mencukupi.');
                        }

                        $size->stock = $newStock;
                        $size->save();

                        $transactionDetail->quantity = $product['quantity'];
                        $transactionDetail->price = $product['price'];
                        $transactionDetail->weight = $productInfo->productWeight; // Ambil weight dari produk
                        $transactionDetail->save();
                    } else {
                        throw new \Exception('Informasi produk tidak ditemukan.');
                    }
                } else {
                    throw new \Exception('Ukuran tidak ditemukan.');
                }
            }

            // Hapus keranjang belanja setelah transaksi selesai
            Cart::where('userID', $userId)->delete();

            // Kembalikan respon yang sesuai
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!', 'transactionID' => $transaction->transactionID]);
        } catch (\Exception $e) {
            // Kembalikan pesan error jika terjadi exception
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

}
