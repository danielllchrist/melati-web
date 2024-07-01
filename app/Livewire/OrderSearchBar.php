<?php

namespace App\Livewire;

use Livewire\Component;

class OrderSearchBar extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.order-search-bar');
    }
}
