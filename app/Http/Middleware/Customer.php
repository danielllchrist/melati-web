<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Customer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect()->route('LogIn');
        }

        if(auth()->check()){
            if(auth()->user()->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e'){
                return redirect()->route('AdminDashboard');
            }
            if(auth()->user()->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b'){
                return redirect()->route('ShippingServiceDashboard');
            }
        }

        return $next($request);
    }
}
