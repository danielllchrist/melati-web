<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        return response()->view('customer.checkout');
    }

    public function payment()
    {
        return response()->view('customer.payment');
    }

    public function myorder()
    {
        return response()->view('customer.myorder');
    }

    public function detail_myorder()
    {
        return response()->view('customer.orderdetail', [
            "orderID" => "halo123"
        ]);
    }
}
