<?php

namespace App\Http\Controllers;

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
        #pluck digunakan untuk mengambil kolom productID dan mengembalikan array dari productID tersebut
        ->pluck('productID');

        $filter = $request->input('filter');

        switch ($filter) {
            case 'produk-terbaik':
                $products = Product::whereIn('productID',$Bestproducts)
                ->select('productID','productName','productPrice','productPicturePath')
                ->get();
                break;
            case 'produk-terbaru':
                $products = Product::orderBy('created_at', 'asc')
                ->take(3)
                ->get();
                break;
            case 'rating-tertinggi':
                $products = Product::join('reviews', 'products.productID', '=', 'reviews.productID')
                ->select('products.productID', 'products.productName', 'products.productPrice', 'products.productPicturePath')
                ->groupBy('products.productID')
                ->orderByRaw('AVG(reviews.rating) DESC')
                ->take(3)
                ->get();
                break;
            default:
                $products = Product::whereIn('productID',$Bestproducts)
                ->select('productID','productName','productPrice','productPicturePath')
                ->get();
        }
        return view('customer.landingpage', compact('assets','products', 'filter'));
    }
}
