<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OrderSearchBar extends Component
{
    // public $search = "";

    public function render()
    {
        // $searchTerm = '%' . $this->search . '%';

        // Query untuk pencarian
        // $results = Transaction::with('transactionDetail.product')
        //     ->where('transactionID', 'like', $searchTerm)
        //     ->orWhereHas('transactionDetail.product', function ($query) use ($searchTerm) {
        //         $query->where('productName', 'like', $searchTerm);
        //     })
        //     ->get();

        // // Query untuk menampilkan semua order berdasarkan status
        // $orders1 = Transaction::with('transactionDetail.product')
        //     ->where('statusID', '776dca17-1ef6-39af-a4ab-6a0e396aebfd')
        //     ->get();
        // $orders2 = Transaction::with('transactionDetail.product')
        //     ->where('statusID', '4335b864-4606-36b2-b369-20066c8fdf98')
        //     ->get();
        // $orders3 = Transaction::with('transactionDetail.product')
        //     ->where('statusID', '2ca0d1b2-fb00-337a-baf1-778915c1cc10')
        //     ->get();
        // $orders4 = Transaction::with('transactionDetail.product')
        //     ->whereIn('statusID', ['8912da00-47a9-3d4c-a65f-693349642369', '31641997-7050-3c37-b311-c5313eeb1e6e'])
        //     ->get();
        // $orders5 = Transaction::with('transactionDetail.product')
        //     ->where('statusID', 'b54ca2f7-1e96-3f1b-aa7c-cf9e4d5ca58c')
        //     ->get();

        // return view('livewire.order-search-bar');
        // return view('livewire.order-search-bar', compact('results', 'orders1', 'orders2', 'orders3', 'orders4', 'orders5'));
    }
}
