<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
        $product = Product::all();
        return view('customer.catalog', compact('product'));
    }

    public function detail_product()
    {
        return view('customer.detail');
    }
}
