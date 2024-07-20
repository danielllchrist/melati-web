<?php

namespace App\Http\Controllers\customer;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MixMatchController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(5)->get();
        $atasan = Product::where('ProductCategory', 'Atasan')->take(3)->get();
        $bawahan = Product::where('ProductCategory', 'Bawahan')->take(3)->get();
        $aksesoris = Product::where('ProductCategory', 'Aksesoris')->take(3)->get();
        return response()->view('customer.mixmatch', compact('products', 'atasan', 'bawahan', 'aksesoris'));
    }

    public function addCart(){
        // ada paramater ID Product nanti disini create cart baru

        // redirect to cart page
        return redirect()->route('CustomerCart')->with('success', 'Produk berhasil dimasukkan ke keranjang  ');;
    }
}
