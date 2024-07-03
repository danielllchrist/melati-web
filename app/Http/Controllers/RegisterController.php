<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index () {
        return view('customer.register');
    }

    public function store (RegisterRequest $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        unset($validated['confirm-password']);
        User::create($validated);
        return redirect('/masuk')->with('success', 'Berhasil Daftar! Silakan Masuk!');
    }
}
