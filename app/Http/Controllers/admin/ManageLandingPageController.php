<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ManageAsset;
use App\Models\Product;
use App\Models\Review;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageLandingPageController extends Controller
{
    public function index(Request $request) {
        $assets = ManageAsset::all();

        $Bestproducts = TransactionDetail::select('productID')
        ->groupBy('productID')
        ->orderByRaW('SUM(quantity) desc')
        ->take(3)
        ->get()
        ->pluck('productID');
        #pluck digunakan untuk mengambil kolom productID dan mengembalikan array dari productID tersebut
        $product_terbaik = Product::whereIn('productID',$Bestproducts)
        ->select('productID','productName','productPrice','productPicturePath')
        ->get();

        $product_terbaru = Product::orderBy('created_at', 'asc')
        ->take(3)
        ->get();

        $product_tertinggi = Product::join('reviews', 'products.productID', '=', 'reviews.productID')
        ->select('products.productID', 'products.productName', 'products.productPrice', 'products.productPicturePath')
        ->groupBy('products.productID')
        ->orderByRaw('AVG(reviews.rating) DESC')
        ->take(3)
        ->get();

        $products = Product::whereIn('productID',$Bestproducts)
        ->select('productID','productName','productPrice','productPicturePath')
        ->get();

        return view('admin.manageasset', compact('assets','products','product_terbaik', 'product_terbaru', 'product_tertinggi'));
    }


    public function managecarousel() {

        $manageAsset = ManageAsset::all();
        // dd($manageAsset);

        return view('admin.carouselmanager', compact('manageAsset'));

    }

    public function uploadImage(Request $request, $id)
    {
        try {
            // Log the request data
            Log::info('Upload Image Request:', $request->all());
            Log::info($id);
            // Validate the request
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:4096',
            ]);

            // Handle the image upload
            if (!$request->hasFile('image')) {
                Log::error('No image file found in the request');
                return response()->json(['success' => false, 'message' => 'No image file found'], 400);
            }

            $image = $request->file('image');
            $path = $image->store('public/uploads');

            // Update image path in the database
            $manageAsset = ManageAsset::find($id);
            Log::info($manageAsset);
            $manageAsset->assetPath = Storage::url($path);
            $manageAsset->save();

            return response()->json([
                'success' => true,
                'filePath' => Storage::url($path)
            ]);
        } catch (\Exception $e) {
            Log::error('Error uploading image: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error uploading image'], 500);
        }
    }

    public function deleteImage($id)
    {
        try {
            $manageAsset = ManageAsset::find($id);
            if (!$manageAsset) {
                return response()->json(['success' => false, 'message' => 'Asset not found'], 404);
            }

            // Update the asset path to the placeholder image URL
            $manageAsset->assetPath = 'https://fakeimg.pl/800x400';
            $manageAsset->save();
            return response()->json(['success' => true, 'message' => 'Image replaced with placeholder']);
        } catch (\Exception $e) {
            Log::error('Error replacing image: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error replacing image'], 500);
        }
    }
}
