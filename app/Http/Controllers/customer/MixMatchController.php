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
        $atasan = Product::where('ProductCategory', 'Atasan')->get();
        $bawahan = Product::where('ProductCategory', 'Bawahan')->get();
        $aksesoris = Product::where('ProductCategory', 'Aksesoris')->get();
        $carts = "";
        if(auth()->user()){
            $carts = Cart::where('userID', auth()->user()->userID)->get();
        }

        return response()->view('customer.mixmatch', compact('products', 'atasan', 'bawahan', 'aksesoris','carts'));
    }

    public function addCart(Request $request)
    {
        // dd($request);
        $userID = Auth::id();
        // foreach the request attr
        foreach ($request->all() as $key => $value) {
            // if the key is not _token
            if ($key != '_token') {
                if ($value == null) {
                    if ($key == 'atasan') {
                        $value = Product::where('productCategory', 'Atasan')->first()->productID;
                    } else if ($key == 'bawahan') {
                        $value = Product::where('productCategory', 'Bawahan')->first()->productID;
                    } else if ($key == 'aksesoris') {
                        $value = Product::where('productCategory', 'Aksesoris')->first()->productID;
                    } else if ($key == 'produk3') {
                        break;
                    } else {
                        // dd("Error");
                    }
                }
                // where size is the samew with ProductID and the first created size
                $size = Size::where('productID', $value)->oldest('created_at')->first();
                if ($size == null) {
                    dd(['message' => "produk gada cok", 'value' => $value]);
                }
                $quantity = 1;
                // check if the stock of the products is still viable
                if ($request->size) {
                    $stock = $size->stock;
                    if ($stock < $quantity) {
                        return redirect()->back()->with('error', 'Stok Produk tidak mencukup untuk jumlah yang diinginkan');
                    }
                }

                // check if the product is already in the cart
                $cart = Cart::where('userID', $userID)->where('sizeID', $size->sizeID)->first();
                if ($cart) {
                    $cart->quantity += $quantity;
                    $cart->save();
                } else {
                    // create new cart
                    $insertQuery = "INSERT INTO `carts` (`userID`, `sizeID`, `quantity`) VALUES (?, ?, ?)";
                    DB::insert($insertQuery, [$userID, $size->sizeID, $quantity]);
                }
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
            $products = Product::where('productName', 'like', '%Kebaya Encim Sleeveless%')
                ->orWhere('productName', 'like', '%Suar Obi Belt%')
                ->get();
            $count = 1;
        } else if ($card == 2) {
            $products = Product::where('productName', 'like', '%Obi Belt Kinasih%')
                ->orWhere('productName', 'like', '%Gayatri Set Outer%')
                ->orWhere('productName', 'like', '%Basic Inner Top%')
                ->get();
            $count = 2;
        } else if ($card == 3) {

            $products = Product::where('productName', 'like', '%Dama Kara Wide Pants%')
                ->orWhere('productName', 'like', '%Gayatri Sweater%')
                ->get();

            $count = 3;
        } else if ($card == 4) {
            $products = Product::where('productName', 'like', '%Hanna Printed Sleeves%')
                ->orWhere('productName', 'like', '%Brown HeavyPants%')
                ->get();

            $count = 4;
        } else if ($card == 5) {
            $products = Product::where('productName', 'like', '%Dama Kara Scrunchie%')
                ->orWhere('productName', 'like', '%Puffy Eco Linen Blouse%')
                ->get();
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
