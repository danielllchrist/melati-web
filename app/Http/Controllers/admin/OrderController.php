<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders1 = Transaction::with('transactionDetail')->where('statusID', "1")->get();
        $orders2 = Transaction::with('transactionDetail')->where('statusID', "2")->get();
        $orders3 = Transaction::with('transactionDetail')->where('statusID', "3")->get();
        $orders4 = Transaction::with('transactionDetail')->where('statusID', '4')->orWhere('statusID', '5')->get();
        $orders5 = Transaction::with('transactionDetail')->where('statusID', "6")->get();

        return view('admin.orderstatus', compact("orders1","orders2","orders3","orders4","orders5"));
    }

    public function orderdetail($orderID)
    {
        $order = Transaction::find($orderID);
        return view('admin.orderdetail', compact('order'));
    }
}
