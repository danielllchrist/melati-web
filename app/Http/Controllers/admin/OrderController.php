<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Transaction::with('transactionDetail')->get();
        
        return response()->view('admin.orderstatus', compact("orders"));
    }

    public function orderdetail()
    {
        return response()->view('admin.orderdetail', [
            "orderID" => "halo123"
        ]);
    }
}
