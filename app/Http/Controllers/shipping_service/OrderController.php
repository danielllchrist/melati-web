<?php

namespace App\Http\Controllers\shipping_service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('shipping_service.orderstatus');
    }

    public function orderdetail()
    {
        return view('shipping_service.orderdetail');
    }
}
