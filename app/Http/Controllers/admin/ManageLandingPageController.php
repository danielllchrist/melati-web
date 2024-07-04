<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ManageAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ManageLandingPageController extends Controller
{

    public function managecarousel() {
        return view('admin.carouselmanager');


        // $storage = '\assets\dummy-img\Screenshot 2024-05-18 162312.png';


        $manageAsset = ManageAsset::all();
        // dd($manageAsset);

        return view('admin.carouselmanager',compact('manageAsset'));
        
    }

    // public function uploadImage(Request $request)   
    // {
        
    //     // untuk memvalidasi file yang akan di upload
    //     $request->validate([
    //         'image'=> 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    //     ]);

    //     // untuk menyimpan gambar
    //     $image = $request->file('image');
    //     $path = $image->store('public/uploads');


    //     //untuk menyimparn gambar ke database manage_assets
    //     $manageAsset = ['assetPath'=>Storage::url($path)];
    //     ManageAsset::create($manageAsset);
        
    //     return response()->json([
    //         'success' => true,
    //         'filePath' => Storage::url($path)
    //     ]);
    // }
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

            $assetPath = str_replace('/storage', 'public', $manageAsset->assetPath);
            if (Storage::exists($assetPath)) {
                Storage::delete($assetPath);
            }

            $manageAsset->delete();

            return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Error deleting image: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error deleting image'], 500);
        }
    }
}
