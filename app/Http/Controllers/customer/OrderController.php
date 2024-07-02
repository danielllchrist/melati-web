<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
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

    public function confirmOrder(Request $request)
    {
        $transaction = Transaction::find($request->transactionID);

        if ($transaction) {
            $transaction->statusID = '2'; // Ganti dengan status ID baru
            $transaction->updated_at = Carbon::now(); 
            $transaction->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function rejectOrder(Request $request)
    {
        $transactionID = $request->input('transactionID');
        
        $order = Transaction::find($transactionID);
        if ($order) {
            $order->statusID = 6; 
            $order->updated_at = Carbon::now(); 
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
    public function sendOrder(Request $request)
    {
    }
}
