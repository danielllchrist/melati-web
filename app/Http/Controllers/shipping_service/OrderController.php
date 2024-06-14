<?php

namespace App\Http\Controllers\shipping_service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return response()->view('shipping_service.orderstatus');
    }

    public function orderdetail()
    {
        return response()->view('shipping_service.orderdetail', [
            "orderID" => "halo123"
        ]);
    }
}
