<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist; // Assuming you have a Wishlist model

class WishlistController extends Controller
{
    public function productWish(Request $request)
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->get(); // Retrieve the wishlist for the current user
        $productWish = [];

        foreach ($wishlist as $wish) {
            $productWish[] = Product::find($wish->product_id); // Retrieve the products in the wishlist
        }

        return view('customer.wishlist', compact('productWish'));
    }

}