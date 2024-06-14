<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        return response()->view('customer.catalog');
    }

    public function detail_product()
    {
        return response()->view('customer.detail', [
            "orderID" => "halo123"
        ]);
    }

    public function review()
    {
        return response()->view('customer.review');
    }

    public function return()
    {
        return response()->view('customer.return');
    }
}
