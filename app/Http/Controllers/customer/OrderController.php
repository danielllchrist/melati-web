<?php

namespace App\Http\Controllers\customer;

use App\Models\VoucherUsage;
use Carbon\Carbon;
use App\Models\Size;
use App\Models\User;
use App\Models\Address;
use App\Models\Regency;
use App\Models\Voucher;
use App\Models\District;
use App\Models\Province;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout($transactionID)
    {
        // cari user
        $user = Auth::user();

        // get item from transaction details
        $items = TransactionDetail::where('transactionID', $transactionID)->get();
        $vouchers = Voucher::all();

        // $vouchers = null;
        // // make a collection vouchers based on user
        // foreach ($allVouchers as $v) {
        //     $vouchers[] = $v->voucherName;
        // }

        $targetVoucher = null;

        // get address that user have
        $addresses = $user->address;

        // default address
        $latestAddress = Address::where('userID', $user->userID)->latest('updated_at')->first();

        // make a subtotal based on item quantity and item price
        $totalWeight = 0;
        $subtotal = 0;
        foreach ($items as $item) {
            // Disini, digunakan size dan bukan produk karena setiap produk ada size nya sendiri
            $subtotal += $item->quantity * $item->size->product->productPrice;
            $totalWeight += $item->size->product->productWeight;
        }

        // 2 Ribu
        $shipping = 15000;

        $total = $subtotal + $shipping;

        // get transaction data
        $transaction = Transaction::find($transactionID);
        $transaction->userID = $user->userID;

        // Status ID di set pas udah bayar
        $transaction->totalWeight = $totalWeight;
        $transaction->subTotalPrice = $subtotal;
        $transaction->totalPrice = $total;
        $transaction->shippingFee = $shipping;
        $transaction->save();

        // ambil pilihan alamat
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        $tempTotalPrice = null;

        return view('customer.checkout', compact('provinces', 'regencies', 'districts', 'items', 'vouchers', 'addresses', 'targetVoucher', 'transaction', 'latestAddress', 'tempTotalPrice'));
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
        // cari transaction
        $transaction = Transaction::find($transactionID);

        // cari user
        $user = Auth::user();

        // get item from transaction details
        $items = TransactionDetail::where('transactionID', $transactionID)->get();

        $vouchers = Voucher::all();

        // get address that user have
        $addresses = $user->address;

        // default address
        $latestAddress = Address::where('userID', $user->userID)->latest('updated_at')->first();

        // make a subtotal based on item quantity and item price
        $totalWeight = 0;
        $subtotal = 0;
        foreach ($items as $item) {
            // Disini, digunakan size dan bukan produk karena setiap produk ada size nya sendiri
            $subtotal += $item->quantity * $item->size->product->productPrice;
            $totalWeight += $item->size->product->productWeight;
        }

        // 2 Ribu
        $shipping = $totalWeight * 2;

        $total = $subtotal + $shipping;

        $targetVoucher = null;
        // if user didn't choose any vouchers / if targetVoucher is not selected
        if ($voucherID == 'null') {
            return view('customer.checkout', compact('provinces', 'regencies', 'districts', 'items', 'vouchers', 'addresses', 'transaction', 'targetVoucher', 'latestAddress', 'tempTotalPrice'))->with('Error');
        }

        $targetVoucher = Voucher::where('voucherID', $voucherID)->first();
        $transaction->voucherID = $voucherID;
        $transaction->totalDiscount = $targetVoucher->voucherNominal;
        $tempTotalPrice = $transaction->totalPrice - $targetVoucher->voucherNominal;
        $transaction->save();

        // ambil pilihan alamat
        $provinces = Province::all();
        $regencies = Regency::all();
        $districts = District::all();

        return view('customer.checkout', compact('provinces', 'regencies', 'districts', 'items', 'vouchers', 'addresses', 'transaction', 'targetVoucher', 'latestAddress', 'tempTotalPrice'));
    }

    public function getRegencies($provinsi_id)
    {
        $regencies = Regency::where('province_id', $provinsi_id)->pluck('name', 'id');
        return response()->json(['regencies' => $regencies]);
    }

    public function getDistricts($kota_id)
    {
        $districts = District::where('regency_id', $kota_id)->pluck('name', 'id');
        return response()->json(['districts' => $districts]);
    }

    public function payment(Request $request, $transactionID, $tempTotalPrice = 0, $voucherID = null)
    {
        // jika user ga pilih alamat, maka pilih alamat paling pertama
        if ($request->selected_address == null) {
            $addressID = Auth::user()->address->first()->addressID;
        }

        // mengurangi stok produk size dari database
        $items = TransactionDetail::where('transactionID', $transactionID)->get();

        // cari transaction
        $transaction = Transaction::find($transactionID);

        if ($tempTotalPrice) {
            $transaction->totalPrice = $tempTotalPrice;
        }

        // update transaction
        if (!$request->selected_address) {
            $transaction->addressID = Auth::user()->address->first()->addressID;
        } else {
            $transaction->addressID = $request->selected_address;
        }
        $transaction->voucherID = $request->selected_voucher_name;

        if ($request->selected_voucher_name != null || $voucherID) {
            // add entry of voucher usage table
            $userID = Auth::id();
            if ($request->selected_voucher_name != null) {
                $voucherResult = $request->selected_voucher_name;
            } else {
                $voucherResult = $voucherID;
            }
            // check if existing voucher with the same voucherid and user id is already in the database
            $voucherExists = VoucherUsage::where('voucherID', $voucherResult)->where('userID',  $userID)->first();
            if ($voucherExists) {
                $voucherExists->updated_at = Carbon::now();
            } else {
                $voucherUsage = new VoucherUsage();
                $voucherUsage->voucherID = $voucherResult;
                $voucherUsage->userID = $userID;
                $voucherUsage->save();
            }
        }

        $transaction->paymentMethod = $request->payment;
        $transaction->save();
        $id = $transaction->transactionID;
        $total = $transaction->totalPrice;

        $otp = rand(10000, 99999);



        return view('customer.payment', compact('otp', 'id', 'total'));
    }

    public function pay($transactionID)
    {
        $transaction = Transaction::find($transactionID);
        $transaction->statusID = 1;
        $transaction->save();

        return response()->json(['success' => true]);
    }

    public function cancel($transactionID)
    {
        $transaction = Transaction::find($transactionID);
        $transaction->statusID = 6;
        $transaction->save();
        // get all transaction detail, foreach all transaction detail and find size and add stock to size
        $items = TransactionDetail::where('transactionID', $transactionID)->get();
        foreach ($items as $item) {
            $size = Size::find($item->sizeID);
            $size->stock += $item->quantity;
            $size->save();
        }
        // remove the entry on the voucher usage table
        $userID = Auth::id();
        $voucherUsage = VoucherUsage::where('voucherID', $transaction->voucherID)
            ->where('userID',  $userID)->first();
        if ($voucherUsage) {
            $voucherUsage->delete();
        }
        return redirect()->route('CustomerDetailOrder', ['orderID' => $transactionID]);
    }

    public function myorder()
    {
        $userID = Auth::id();
        $user = User::find($userID);

        // Ambil semua pesanan dengan status 1 hingga 7 dan urutkan berdasarkan updated_at dari paling baru hingga paling lama
        $orders1 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', "1")
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders2 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->whereIn('statusID', ['2', '3'])
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders3 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', "4")
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders4 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', '5')
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders5 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', "6")
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders6 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', "7")
            ->orderBy('updated_at', 'desc')
            ->get();

        // Ubah status transaksi dalam orders3 jika updated_at lebih dari 2 hari yang lalu
        foreach ($orders3 as $order) {
            if (Carbon::parse($order->updated_at)->addDays(2)->isPast()) {
                $order->statusID = 5;
                $order->save(); // Simpan perubahan
            }
        }

        // Perbarui orders4 setelah melakukan perubahan status
        $orders4 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', '5')
            ->orderBy('updated_at', 'desc')
            ->get();
            
        $orders3 = Transaction::with('transactionDetail')
            ->where('userID', $userID)
            ->where('statusID', "4")
            ->orderBy('updated_at', 'desc')
            ->get();


        $carts = Cart::where('userID', auth()->user()->userID)->get();

        return view('customer.myorder', compact("orders1", "orders2", "orders3", "orders4", "orders5", "orders6", "user",'carts'));
    }

    public function detail_myorder($orderID)
    {
        $userID = Auth::id();
        $user = User::find($userID);

        $order = Transaction::find($orderID);

        $carts = Cart::where('userID', auth()->user()->userID)->get();

        return view('customer.orderdetail', compact('order', 'user','carts'));
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
