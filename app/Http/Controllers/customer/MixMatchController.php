<?php

namespace App\Http\Controllers\customer;

use App\Models\Cart;
use App\Models\Size;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MixMatchController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(5)->get();
        $atasan = Product::where('ProductCategory', 'Atasan')->get();
        $bawahan = Product::where('ProductCategory', 'Bawahan')->take(3)->get();
        $aksesoris = Product::where('ProductCategory', 'Aksesoris')->take(3)->get();

        // get data from database where product name contains 'Product 1'
        $card1 = Product::where('productName', 'like', '%Produk 1%')->get();
        $card2 = Product::where('productName', 'like', '%Produk 2%')->get();
        $card3 = Product::where('productName', 'like', '%Produk 3%')->get();
        $card4 = Product::where('productName', 'like', '%Produk 4%')->get();
        $card5 = Product::where('productName', 'like', '%Produk 5%')->get();

        return response()->view('customer.mixmatch', compact('products', 'atasan', 'bawahan', 'aksesoris', 'card1', 'card2', 'card3', 'card4', 'card5'));
    }

    public function addCart(Request $request)
    {

        // dd($request->all());
        $userID = Auth::id();
        // foreach the request attr
        foreach ($request->all() as $key => $value) {
            // if the key is not _token
            if ($key != '_token') {
                $size = Size::where('productID', $value)->first();
                if ($size == null) {
                    // dd(['message' => "produk gada cok", 'value' => $value]);
                }
                $quantity = 1;
                // check if the stock of the products is still viable
                if ($request->size) {
                    $stock = $size->stock;
                    if ($stock < $quantity) {
                        return redirect()->back()->with('error', 'Stok Produk tidak mencukup untuk jumlah yang diinginkan');
                    }
                }

                // create new cart
                $insertQuery = "INSERT INTO `carts` (`userID`, `sizeID`, `quantity`) VALUES (?, ?, ?)";
                DB::insert($insertQuery, [$userID, $size->sizeID, $quantity]);
            }
        }

        // redirect to cart page
        return redirect()->route('CustomerCart')->with('success', 'Produk berhasil dimasukkan ke keranjang');
    }

    public function searchProductAjax($category)
    {
        $products = Product::where('productCategory', $category)->get();

        foreach ($products as $p) {
            $data[] = [$p['productName'], $p['productID'], $p['productPicturePath']];
        }

        return $data;
    }

    public function getProductAjax($card)
    {
        $count = 0;
        if ($card == 1) {
            $products = Product::where('productName', 'like', '%Produk 1%')->get();
            $count = 1;
        } else if ($card == 2) {

            $products = Product::where('productName', 'like', '%Produk 2%')->get();
            $count = 2;
        } else if ($card == 3) {

            $products = Product::where('productName', 'like', '%Produk 3%')->get();
            $count = 3;
        } else if ($card == 4) {
            $products = Product::where('productName', 'like', '%Produk 4%')->get();
            $count = 4;
        } else if ($card == 5) {
            $products = Product::where('productName', 'like', '%Produk 5%')->get();
            $count = 5;
        } else {
            dd($card);
        }

        foreach ($products as $p) {
            $path = Storage::url(json_decode($p->productPicturePath)[0]);
            $data[] = [$p['productName'], $p['productID'], $path, $count, $p['productPrice']];
        }

        return $data;
    }

    public function getImageUrl($productID)
    {
        // Retrieve the item from the database
        $product = Product::find($productID);

        // Return the image URL
        return Storage::url(json_decode($product->productPicturePath));
    }
}
