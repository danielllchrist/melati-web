<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\ReturnOrder;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function index($transactionID)
    {
        $userID = Auth::id();
        $user = User::find($userID);

        $transaction = Transaction::with('transactionDetail.product', 'transactionDetail.size', 'status')
                                  ->where('transactionID', $transactionID)
                                  ->firstOrFail();
         
        $carts = Cart::where('userID', auth()->user()->userID)->get();                          

        return view('customer.return', compact('transaction', 'user','carts'));
    }

    public function store(Request $request, $transactionID)
    {
        $request->validate([
            'reason' => 'required|max:1000',
        ]);

        // Buat pengembalian baru
        ReturnOrder::create([
            'transactionID' => $transactionID,
            'comment' => $request->reason,
        ]);

        // Perbarui status transaksi menjadi 7
        $transaction = Transaction::where('transactionID', $transactionID)->firstOrFail();
        $transaction->statusID = 7;
        $transaction->save();

        return redirect()->route('CustomerMyOrder');
    }
}

