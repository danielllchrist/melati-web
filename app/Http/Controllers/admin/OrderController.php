<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
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
        $orders6 = Transaction::with('transactionDetail')->where('statusID', "7")->get();

        return view('admin.orderstatus', compact("orders1","orders2","orders3","orders4","orders5","orders6"));
    }

    public function orderdetail($orderID)
    {
        $order = Transaction::find($orderID);
        return view('admin.orderdetail', compact('order'));
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
        dd($transaction);
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
}
