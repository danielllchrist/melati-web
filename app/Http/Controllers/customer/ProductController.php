<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\WishlistRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Size;
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

        if ($query) {
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
        } elseif ($gender) {
            $product = Product::where('forGender', $gender)
                ->get();
        }

        if(auth()->user()){
            $carts = Cart::where('userID', auth()->user()->userID)->get();
            return view('customer.catalog', compact('product', 'carts'));
        }

        return view('customer.catalog', compact('product'));
    }

    public function men_catalogue(){
        $product = Product::where('forGender','Pria')->get();
        $carts = Cart::where('userID', auth()->user()->userID)->get();
        return view('customer.catalog',compact('product', 'carts'));
    }

    public function women_catalogue(){
        $product = Product::where('forGender','Wanita')->get();
        $cart = Cart::where('userID', auth()->user()->userID)->get();
        return view('customer.catalog',compact('product', 'carts'));
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
        $product = Product::with('size')->findOrFail($id);
        $carts = Cart::where('userID', auth()->user()->userID)->get();
        // dd($product->size);
        return view('customer.detail', compact('product', 'carts'));
    }


    public function get_stock($productID, $size)
    {
        $query = "SELECT * FROM `sizes` WHERE `size` = ? AND `productID` = ?";
        $sizeRecord = DB::select($query, [$size, $productID]);

        if ($sizeRecord) {
            return response()->json(['stock' => $sizeRecord[0]->stock]);
        } else {
            return response()->json(['error' => 'Size not found'], 404);
        }
    }

    public function add_cart(Request $request)
    {
        // Validation
        $request->validate([
            'productID' => 'required|exists:products,productID',
            'size' => 'required|exists:sizes,size',
            'quantity' => 'required|integer|min:1'
        ]);

        $productID = $request->input('productID');
        $size = $request->input('size');
        $quantity = $request->input('quantity');

        // Cari sizeID di tabel sizes
        $sizeCheck = DB::table('sizes')
            ->where('productID', $productID)
            ->where('size', $size)
            ->first();

        if (!$sizeCheck) {
            return redirect()->back()->with('error', 'Size not found.');
        }

        $sizeID = $sizeCheck->sizeID;
        $userID = Auth::id();

        // Check if the cart item already exists for the user and sizeID
        $existingCart = Cart::where('userID', $userID)
            ->where('sizeID', $sizeID)
            ->first();

        if ($existingCart) {
            // Update quantity if item already exists in cart
            if ($sizeCheck->stock >= $existingCart->quantity + $quantity) {
                $existingCart->quantity += $quantity;
            } else {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
            $existingCart->save();
        } else {
            // Insert new cart item if it doesn't exist
            if ($sizeCheck->stock >= $quantity) {
                DB::table('carts')->insert([
                    'userID' => $userID,
                    'sizeID' => $sizeID,
                    'quantity' => $quantity,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            } else {
                return redirect()->back()->with('error', 'Not enough stock available.');
            }
        }

        return redirect()->back()->with('success', 'Added successfully');
    }


    public function wishList($productID)
    {
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
