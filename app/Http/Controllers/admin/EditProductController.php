<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class EditProductController extends Controller
{
    public function index()
    {
        return view('admin.product.edit');
    }
}
