<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('customer.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where('email', $credentials['email'])->first();
            // $request->session()->put('username', $user->name);
            if ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
                return redirect()->intended(route('AdminDashboard'));
            } elseif ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
                return redirect()->intended(route('ShippingServiceDashboard'));
            } else {
                return redirect()->intended(route('LandingPage'));
            }
        }
        return back()->with('loginError', 'Kredensial Invalid!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('LandingPage'));
    }
}
