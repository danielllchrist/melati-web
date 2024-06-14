<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
    }

    public function chat(Request $request)
    {
        $prefix = $request->segment(1);

        switch ($prefix) {
            case 'admin':
                return view('admin.chat');
            default:
                return view('customer.chat');
        }
    }
}
