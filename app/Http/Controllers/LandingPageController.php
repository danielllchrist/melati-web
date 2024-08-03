<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ManageAsset;
use App\Models\Product;
use App\Models\Review;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    $topRatedProductIDs = Review::select('productID', DB::raw('AVG(rating) as average_rating'))
        ->groupBy('productID')
        ->orderBy('average_rating', 'DESC')
        ->take(3)
        ->pluck('productID');

    // Mengambil detail produk dari tabel products
    $product_tertinggi = Product::whereIn('productID', $topRatedProductIDs)
        ->select('productID', 'productName', 'productPrice', 'productPicturePath')
        ->get();

        $products = Product::whereIn('productID',$Bestproducts)
        ->select('productID','productName','productPrice','productPicturePath')
        ->get();
        $carts = "";
        if(auth()->user()){
            $carts = Cart::where('userID', auth()->user()->userID)->get();
        }

        return view('customer.landingpage', compact('assets','carts','products','product_terbaik', 'product_terbaru', 'product_tertinggi'));

        
    }
}
