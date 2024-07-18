<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\WishlistRequest;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $product = Product::all();

        $gender = $request->query('gender');
        $category = $request->query('category');

        $query = $request->input('search');

        if($query){
            $product = Product::where('productName', 'like', '%' . $query . '%')
                ->orWhere('productCategory', 'like', '%' . $query . '%')
                ->orWhere('productDescription', 'like', '%' . $query . '%')
                ->orWhere('forGender', 'like', '%' . $query . '%')
                ->get();
        }

        if ($gender && $category) {
            $product = Product::where('productCategory', $category)
                ->where('forGender', $gender)
                ->get();
        }

        return view('customer.catalog', compact('product'));
    }

    public function wish(Request $request)
    {
        $productID = $request->input('productID');
        $userID = (string) auth()->user()->userID;
        $now = now();

        // Check if the product is already wished using raw SQL
        $query = "SELECT * FROM `wishlists` WHERE `productID` = ? AND `userID` = ?";
        $existingWish = DB::select($query, [$productID, $userID]);

        if (empty($existingWish)) {
            // Create a new wish using raw SQL
            $insertQuery = "INSERT INTO `wishlists` (`userID`, `productID`, `created_at`, `updated_at`, `deleted_at`)
                        VALUES (?, ?, ?, ?, ?)";
            DB::insert($insertQuery, [$userID, $productID, $now, $now, $now]);
        }

        return redirect()->back();
    }

    public function unwish(Request $request)
    {
        $productID = $request->input('productID');
        $userID = (string) auth()->user()->userID;

        // Delete the wish using raw SQL with parameter binding
        $deleteQuery = "DELETE FROM `wishlists` WHERE `productID` = ? AND `userID` = ?";
        DB::delete($deleteQuery, [$productID, $userID]);

        return redirect()->back();
    }


    public function detail_product($id)
    {
        $product = Product::findOrFail($id);
        return view('customer.detail', compact('product'));
    }

    public function wishList($id)
    {
        if (!Auth::check()) {
            return redirect('masuk');
        }

        $user_id = Auth::user()->userID;

        $wcheck = WishList::where('userID', $user_id)->where('productID', $id)->first();

        if (isset($wcheck)) {

            $new = WishList::create([
                'userID' => $user_id,
                'productID' => $id
            ]);
            return redirect()->route('katalogDetail', $id);
        } else {
            $wcheck->delete();
            return redirect()->route('katalogDetail', $id);
        }
    }

    public function review()
    {
        return view('customer.review');
    }

    public function return()
    {
        return view('customer.return');
    }
}
