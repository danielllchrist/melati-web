<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('customer.catalog');
    }

    public function women_catalogue()
    {
        //
    }

    public function men_catalogue()
    {
        //
    }

    public function detail_product()
    {
        return view('customer.detail');
    }
}
