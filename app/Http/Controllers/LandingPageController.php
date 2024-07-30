<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ManageAsset;
use App\Models\Product;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request){
        $assets = ManageAsset::all();

        $Bestproducts = TransactionDetail::select('productID')
        ->groupBy('productID')
        ->orderByRaW('SUM(quantity) desc')
        ->take(3)
        ->get()
        ->pluck('productID');
        #pluck digunakan untuk mengambil kolom productID dan mengembalikan array dari productID tersebut
        $product_terbaik = Product::whereIn('productID',$Bestproducts)
        ->select('productID','productName','productPrice','productPicturePath')
        ->get();

        $product_terbaru = Product::orderBy('created_at', 'asc')
        ->take(3)
        ->get();

        $product_tertinggi = Product::join('reviews', 'products.productID', '=', 'reviews.productID')
        ->select('products.productID', 'products.productName', 'products.productPrice', 'products.productPicturePath')
        ->groupBy('products.productID')
        ->orderByRaw('AVG(reviews.rating) DESC')
        ->take(3)
        ->get();

        $products = Product::whereIn('productID',$Bestproducts)
        ->select('productID','productName','productPrice','productPicturePath')
        ->get();

        if(auth()->user()){
            $carts = Cart::where('userID', auth()->user()->userID)->get();
        }

        return view('customer.landingpage', compact('assets','carts','products','product_terbaik', 'product_terbaru', 'product_tertinggi'));

        
    }
}
