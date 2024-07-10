<?php

namespace App\Http\Controllers\customer;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Size;
use App\Models\Voucher;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout($transactionID)
    {
        $user = Auth::user();
        // get item in table carts where the productID is the same as $user->userID
        $carts = $user->cart;

        // make a subtotal based on item quantity and item price
        $totalWeight = 0;
        $subtotal = 0;
        foreach ($carts as $cart) {
            // Disini, digunakan size dan bukan produk karena setiap produk ada size nya sendiri
            $subtotal += $cart->quantity * $cart->size->product->productPrice;
            $totalWeight += $cart->size->product->productWeight;
        }

        // 2 Ribu
        $shipping = $totalWeight * 2;

        // make a collection vouchers based on user
        foreach ($user->voucherUsage as $v) {
            $vouchers[] = $v->voucher;
        }
        $targetVoucher = null;

        $total = $subtotal + $shipping;

        $addresses = $user->address;

        // get transaction data
        $transaction = Transaction::find($transactionID);
        $transaction->userID = $user->userID;
        // Status ID di set pas udah bayar
        $transaction->totalWeight = $totalWeight;
        $transaction->subTotalPrice = $subtotal;
        $transaction->totalPrice = $total;
        $transaction->shippingFee = $shipping;
        $transaction->save();

        return view('customer.checkout', compact('carts', 'vouchers', 'addresses', 'targetVoucher', 'transaction'));
    }

    public function addAddress(Request $request)
    {
        dd($request);
        $user = Auth::user();
        $user->addresses->create($request->all());
        return redirect()->back();
    }

    public function useVoucher($transactionID, $voucherID)
    {

        // get transaction
        $transaction = Transaction::where('transactionID', $transactionID)->first();
        // dd($transaction);

        // get item in table carts where the productID is the same as $user->userID
        $user = Auth::user();
        $carts = $user->cart;

        // make a collection vouchers based on user
        foreach ($user->voucherUsage as $v) {
            $vouchers[] = $v->voucher;
        }

        // get address that user have
        $addresses = $user->address;

        $targetVoucher = null;
        // if user didn't choose any vouchers / if targetVoucher is not selected, send erro
        if ($voucherID == 'null') {
            return view('customer.checkout', compact('carts', 'vouchers', 'addresses', 'transaction', 'targetVoucher'));
        }

        $targetVoucher = Voucher::where('voucherID', $voucherID)->first();
        $transaction->voucherID = $voucherID;
        $transaction->totalDiscount = $targetVoucher->voucherNominal;
        $transaction->totalPrice -= $targetVoucher->voucherNominal;


        return view('customer.checkout', compact('carts', 'vouchers', 'addresses', 'transaction', 'targetVoucher'));
    }
    
    public function payment(Request $request, $transactionID, $cartID)
    {
        // jika user ga pilih alamat, maka pilih alamat paling pertama
        if ($request->selected_address == null) {
            $addressID = Auth::user()->address->first()->addressID;
        }

        // mengurangi stok produk size dari database
        $carts = Cart::where('userID', $cartID)->get();

        // cari transaction
        $transaction = Transaction::find($transactionID);

        // for each sizeID in cart, decrease the stock of table sizes in database based on the quantity of products bought, if the stock is less than 0, give error
        foreach ($carts as $cart) {
            $size = Size::find($cart->sizeID);
            if (!$size) {
                // Size not found, give error
                return back()->withError("Size not found");
            }
            $newStock = $size->stock - $cart->quantity;
            if ($newStock < 0) {
                // Stock is less than 0, give error
                return back()->withError("Not enough stock for size {$size->name}");
            }

            $size->stock = $newStock;
            $size->save();
        }

        // update transaction

        return view('customer.payment');
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
                // $order->statusID = 5;
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
