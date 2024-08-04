<?php

namespace App\Http\Controllers\shipping_service;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // Ambil semua orders2 dengan statusID 2
// Ambil orders2 dengan statusID 2
$orders2 = Transaction::with('transactionDetail')
    ->where('statusID', "2")
    ->get();

    // Filter orders2 yang updated_at nya sudah lebih dari 24 jam
    // $orders2updated = $orders2->filter(function ($order) {
    //     return Carbon::now()->diffInHours($order->updated_at) >= 24;
    // });

    // Urutkan orders2updated berdasarkan updated_at dari yang terbaru
    $orders2updated = $orders2->sortByDesc('updated_at');

    // Hitung need to be pickup
    $countOrders2updated = $orders2updated->count();

    // Hitung on delivery
    $order3Count = Transaction::where('statusID', '3')->count();

    // Ambil orders3 dan orders4 dan urutkan berdasarkan updated_at dari yang terbaru
    $orders3 = Transaction::with('transactionDetail')
        ->where('statusID', "3")
        ->get()
        ->sortByDesc('updated_at');

    $orders4 = Transaction::with('transactionDetail')
        ->where('statusID', '4')
        ->orWhere('statusID', '5')
        ->orWhere('statusID', '7')
        ->get()
        ->sortByDesc('updated_at');

    // sort total orders
    $sortBy = $request->get('sortBy', '4'); // Default ke 'All Orders'

    switch ($sortBy) {
        case '1':
            $orders = Transaction::where('created_at', '>=', now()->startOfWeek())->orderBy('transactionID')->get();
            break;
        case '2':
            $orders = Transaction::where('created_at', '>=', now()->startOfMonth())->orderBy('transactionID')->get();
            break;
        case '3':
            $orders = Transaction::where('created_at', '>=', now()->startOfYear())->orderBy('transactionID')->get();
            break;
        case '4':
            $order1 = Transaction::where('statusID', 2)->orderBy('transactionID')->get();
            $order2 = Transaction::where('statusID', 3)->orderBy('transactionID')->get();
            $order3 = Transaction::where('statusID', 4)->orderBy('transactionID')->get();
            $order4 = Transaction::where('statusID', 5)->orderBy('transactionID')->get();
            $order5 = Transaction::where('statusID', 7)->orderBy('transactionID')->get();
            $orders = $order1->merge($order2)->merge($order3)->merge($order4)->merge($order5);
            break;
        default:
            $orders = Transaction::orderBy('transactionID')->get();
            break;
    }


    return view('shipping_service.orderstatus', compact("orders2updated", "orders3", "orders4",'orders','countOrders2updated','order3Count'));
    }

    public function orderdetail($orderID)
    {
        $order = Transaction::find($orderID);
        return view('shipping_service.orderdetail', compact("order"));
    }

    public function sendorder(Request $request)
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
