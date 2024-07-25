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
        return view('customer.catalog', compact('product'));
    }

    public function men_catalogue(){
        $product = Product::where('forGender','Pria')->get();
        return view('customer.catalog',compact('product'));
    }

    public function women_catalogue(){
        $product = Product::where('forGender','Wanita')->get();
        return view('customer.catalog',compact('product'));
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
        // dd($product->productPicturePath);
        return view('customer.detail', compact('product'));
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

        $sizeQuery = "SELECT * FROM `sizes` WHERE `size` = ? AND `productID` = ?";
        $sizeCheck = DB::select($sizeQuery, [$size, $productID]);

        if (empty($sizeCheck)) {
            return redirect()->back()->with('error', 'Stock not found.');
        }
        
        $sizeCheck = $sizeCheck[0]; // Access the first element, assuming sizeID is unique

        $checkQuery = "SELECT * FROM `carts` WHERE `userID` = ? AND `sizeID` = ?";
        $check = DB::select($checkQuery, [auth()->user()->userID, $sizeCheck->sizeID]);
        if ( count($check) > 1){
            $check = $check[0];
        }
        // dd($sizeCheck, $check);

        if (!empty($check)) {
            $quantity = (int) $quantity;
            if ($sizeCheck->stock > $check->quantity + $quantity) {
                $newQuantity = $check->quantity + $quantity;
            } else {
                $newQuantity = $sizeCheck->stock;
            }

            $updateQuery = "UPDATE `carts` SET `quantity` = ?, `updated_at` = NOW() WHERE `sizeID` = ? AND `userID` = ?";
            DB::update($updateQuery, [$newQuantity, $check->sizeID, auth()->user()->userID]);
        } else {
            $insertQuery = "INSERT INTO `carts` (`userID`, `sizeID`, `quantity`, `created_at`, `updated_at`) VALUES (?, ?, ?, NOW(), NOW())";
            DB::insert($insertQuery, [auth()->user()->userID, $sizeCheck->sizeID, $quantity]);

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
