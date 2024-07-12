<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Size;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id(); // Mendapatkan user ID yang sedang login
        $carts = Cart::where('userID', $userId)->with(['size.product', 'size'])->get();

        // Menghitung total harga
        $total = $carts->sum(function ($cart) {
            return $cart->size->product->productPrice * $cart->quantity;
        });

        $productStocks = $carts->map(function ($cart) {
            return $cart->size->stock;
        })->all();

        return view('customer.cart', compact('carts', 'total','productStocks')); // Mengirim data carts dan total ke view
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

    public function update(Request $request, $id)
    {
        $userId = Auth::id();
        $cart = Cart::where('userID', $userId)->where('sizeID', $id)->first();

        if ($cart) {
            // Mengambil data quantity baru dari request
            $newQuantity = $request->input('quantity');

            // Validasi quantity (opsional)
            if ($newQuantity <= 0) {
                return response()->json(['success' => false, 'message' => 'Quantity harus lebih besar dari 0.'], 400);
            }

            // Update quantity di dalam cart
            $cart->quantity = $newQuantity;
            $cart->save();

            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Item tidak ditemukan di keranjang.'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $userId = Auth::id();
            $products = $request->input('products');
            $totalPrice = $request->input('totalPrice');
            
            // Validasi data
            // $request->validate([
            //     'products' => 'required|array',
            //     'products.*.sizeID' => 'required|exists:sizes,id',
            //     'products.quantity' => 'required|integer|min:1',
            //     'products.*.productPrice' => 'required|numeric|min:0',
            //     'totalPrice' => 'required|numeric|min:0'
            // ]);

            // Buat transaksi baru
            $transaction = new Transaction();

            $transaction->userID = $userId;
            $transaction->subTotalPrice = $totalPrice;
            $transaction->statusID = 1; // Sesuaikan dengan status transaksi yang sesuai

            $lastTransaction = Transaction::latest()->first();

            // Jika transaksi terakhir ada, lanjutkan dengan $transaction->transactionID
            if ($lastTransaction) {
                $transaction->transactionID = $lastTransaction->transactionID + 1;
                $transaction->save();
            } else {
                // Jika tidak ada transaksi sebelumnya, atur transactionID menjadi 1
                $transaction->transactionID = 1;
                $transaction->save();
            }
            // Ambil ID transaksi yang baru saja dibuat
            $transactionId = $transaction->transactionID;

            // Buat detail transaksi untuk setiap item di keranjang
            foreach ($products as $product) {
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transactionID = $transactionId; // Gunakan $transactionId yang telah diperoleh
                $transactionDetail->sizeID = $product['sizeID'];

                // Ambil productID berdasarkan sizeID dari tabel sizes
                $size = Size::find($product['sizeID']);

                if ($size) {
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
            return response()->json(['success' => true, 'message' => 'Transaksi berhasil disimpan!', 'transactionID' => $transactionId]);
        } catch (\Exception $e) {
            // Kembalikan pesan error jika terjadi exception
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

}