<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_total = count(User::all());
        $user_by_gender = User::select(DB::RAW('count(userID) as total'),'gender')->groupBy('gender')->get();
        $transaction_total = count(Transaction::all());
        $earnings_total = Transaction::select( DB::RAW('SUM(subTotalPrice) as total') )->where('statusID','!=',5)->first();
        $discount_total = Transaction::select( DB::RAW('SUM(totalDiscount) as total') )->first();
        $return_total = Transaction::select( DB::RAW('SUM(subTotalPrice) as total') )->where('statusID',5)->first();
        $disc_return = $discount_total->total + $return_total->total;
        $transaction_this_month = count(Transaction::whereMonth('created_at',Carbon::now()->month)->get());
        $earnings_this_month = Transaction::select( DB::RAW('SUM(subTotalPrice) as total') )
        ->whereMonth('created_at',Carbon::now()->month)->where('statusID','!=',5)->first();

        $return_this_month = Transaction::select( DB::RAW('SUM(subTotalPrice) as total') )
        ->whereMonth('created_at',Carbon::now()->month)->where('statusID',5)->first();

        $discount_this_month = Transaction::select( DB::RAW('SUM(totalDiscount) as total') )
        ->whereMonth('created_at',Carbon::now()->month)->first();

        $revenue = Transaction::select( DB::RAW('SUM(subTotalPrice) as revenue'),DB::RAW('MONTH(created_at) month') )
        ->where('statusID','!=',5)
        ->groupBy('month')->get();

        $month_revenue = "";
        $total_revenue = "";
        $i = 0;
        foreach($revenue as $r){
            $i++;
            if($i == 1){
                $month_revenue = $month_revenue . $this->getMonthName($r->month);
                $total_revenue = $total_revenue . ""  . $r->revenue . "" ;
            }else{
                $month_revenue = $month_revenue . "-" . $this->getMonthName($r->month);
                $total_revenue = $total_revenue . "-"  . $r->revenue . "" ;
            }
        }


        return view('admin.admindashboard', compact(
            'month_revenue', 'total_revenue', 'return_this_month',
            'user_by_gender', 'user_total', 'transaction_total',
            'earnings_total', 'discount_total', 'transaction_this_month',
            'earnings_this_month', 'discount_this_month', 'disc_return'));
    }

    public function getMonthName($val){
        $result = null;
        $val == 1 ? $result='Januari' : null;
        $val == 2 ? $result='Februari' : null;
        $val == 3 ? $result='Maret' : null;
        $val == 4 ? $result='April' : null;
        $val == 5 ? $result='Mei' : null;
        $val == 6 ? $result='Juni' : null;
        $val == 7 ? $result='July' : null;
        $val == 8 ? $result='Agustus' : null;
        $val == 9 ? $result='September' : null;
        $val == 10 ? $result='Oktober' : null;
        $val == 11 ? $result='november' : null;
        $val == 12 ? $result='Desember' : null;
        return $result;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
