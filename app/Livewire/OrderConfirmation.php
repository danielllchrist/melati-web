<?php

namespace App\Http\Livewire;

use App\Models\Transaction;
use Livewire\Component;

class OrderConfirmation extends Component
{
    public $transactionId;

    public function mount($transactionId)
    {
        $this->transactionId = $transactionId;
    }

    public function confirmOrder()
    {
        $transaction = Transaction::find($this->transactionId);
        if ($transaction) {
            $transaction->statusID = 'new_status_id'; // Ganti dengan status ID baru
            $transaction->save();
        }
    }

    public function render()
    {
        return view('livewire.order-confirmation');
    }
}
