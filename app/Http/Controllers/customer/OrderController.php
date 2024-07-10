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
       // Ambil semua pesanan dengan status 1 hingga 7
        $orders1 = Transaction::with('transactionDetail')->where('statusID', "1")->get();
        $orders2 = Transaction::with('transactionDetail')->where('statusID', "2")->orWhere('statusID', '3')->get();
        $orders3 = Transaction::with('transactionDetail')->where('statusID', "4")->get();
        $orders4 = Transaction::with('transactionDetail')->where('statusID', '5')->get();
        $orders5 = Transaction::with('transactionDetail')->where('statusID', "6")->get();
        $orders6 = Transaction::with('transactionDetail')->where('statusID', "7")->get();

        // Ubah status transaksi dalam orders3 jika updated_at lebih dari 2 hari yang lalu
        // dd($orders3);
        foreach ($orders3 as $order) {
            // dd($order->statusID);
            if (Carbon::parse($order->updated_at)->addDays(2)->isPast()) {
                $order->statusID = 5; 
                $order->save(); // Simpan perubahan
            }
        }

        // Perbarui orders4 setelah melakukan perubahan status
        $orders4 = Transaction::with('transactionDetail')->where('statusID', '5')->get();
        $orders3 = Transaction::with('transactionDetail')->where('statusID', "4")->get();

        return view('customer.myorder', compact("orders1", "orders2", "orders3", "orders4", "orders5", "orders6"));
    }

    public function detail_myorder($orderID)
    {
        $order = Transaction::find($orderID);
        return view('customer.orderdetail', compact('order'));
    }

    public function cancelOrder(Request $request)
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

    public function accOrder(Request $request)
    {
        $transactionID = $request->input('transactionID');
        
        $order = Transaction::find($transactionID);
        if ($order) {
            $order->statusID = 5; 
            $order->updated_at = Carbon::now(); 
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function returnOrder(Request $request)
    {
        $transactionID = $request->input('transactionID');
        
        $order = Transaction::find($transactionID);
        if ($order) {
            $order->statusID = 7; 
            $order->updated_at = Carbon::now(); 
            $order->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
