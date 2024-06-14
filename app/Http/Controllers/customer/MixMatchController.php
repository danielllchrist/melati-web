<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MixMatchController extends Controller
{
    public function index()
    {
        return response()->view('customer.mixmatch');
    }
}
