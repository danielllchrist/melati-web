<?php

namespace App\Http\Controllers\shipping_service;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Ambil semua orders2 dengan statusID 2
    $orders2 = Transaction::with('transactionDetail')->where('statusID', "2")->get();

    // Filter orders2 yang updated_at nya sudah lebih dari 24 jam
    $orders2updated = $orders2->filter(function ($order) {
        return Carbon::now()->diffInHours($order->updated_at) >= 24;
    });

    // Ambil orders3 dan orders4
    $orders3 = Transaction::with('transactionDetail')->where('statusID', "3")->get();
    $orders4 = Transaction::with('transactionDetail')->where('statusID', '4')->get();

    return view('shipping_service.orderstatus', compact("orders2updated", "orders3", "orders4"));
    }

    public function orderdetail($orderID)
    {
        $order = Transaction::find($orderID);
        return view('shipping_service.orderdetail', compact("order"));
    }

    public function sendOrder(Request $request)
    {
        $transactionID = $request->input('transactionID');
        
        $order = Transaction::find($transactionID);
        if ($order) {
            $order->statusID = 3; 
            $order->updated_at = Carbon::now(); 
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function doneOrder(Request $request)
    {
        $transactionID = $request->input('transactionID');
        
        $order = Transaction::find($transactionID);
        if ($order) {
            $order->statusID = 4; 
            $order->updated_at = Carbon::now(); 
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
