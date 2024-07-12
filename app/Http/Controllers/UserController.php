<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfilePictureRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function profile()
    {
        $userID = Auth::id();
        $user = User::find($userID);

        // Check if the user is an admin
        if ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
            return view('admin.profile', compact('user'));
        }

        // Check if the user is a shipping service
        if ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
            return view('shipping_service.profile', compact('user'));
        }

        // If none of the above, assume the user is a customer
        return view('customer.profile', compact('user'));
    }

    public function update_profile(ProfileRequest $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);

        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->age = $validated['age'];
        $user->gender = $validated['gender'];

        // check if phone number is duplicate
        $existingphone = User::where('phoneNum', $validated['phoneNum']);
        if ($existingphone->count() > 0) {
            if ($existingphone->first()->userID != $userID) {
                return redirect(route('CustomerProfile'))
                    ->withErrors(['phoneNum' => 'Nomor telepon sudah terdaftar!'])
                    ->withInput();
            } else {
                $user->phoneNum = $validated['phoneNum'];
            }
        } else {
            $user->phoneNum = $validated['phoneNum'];
        }

        // check if email is duplicate
        $existingemail = User::where('email', $validated['email']);
        if ($existingemail->count() > 0) {
            if ($existingemail->first()->userID != $userID) {
                return redirect(route('CustomerProfile'))
                    ->withErrors(['email' => 'Email sudah terdaftar!'])
                    ->withInput();
            } else {
                $user->email = $validated['email'];
            }
        } else {
            $user->email = $validated['email'];
        }

        $user->save();

        // Check if the user is an admin
        if ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
            return redirect(route('AdminProfile'))->with('success', 'Profil berhasil diperbarui!');
        }

        // Check if the user is a shipping service
        if ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
            return redirect(route('ShippingServiceProfile'))->with('success', 'Profil berhasil diperbarui!');
        }

        // If none of the above, assume the user is a customer
        return redirect(route('CustomerProfile'))->with('success', 'Profil berhasil diperbarui!');
    }

    public function update_password(UpdatePasswordRequest $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);

        $validated = $request->validated();

        if (Hash::check($validated['old_password'], $user->password)) {
            $user->password = bcrypt($validated['password']);
            $user->save();
            // Check if the user is an admin
            if ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
                return redirect(route('AdminProfile'))->with('success', 'Kata sandi berhasil diperbarui!');
            }

            // Check if the user is a shipping service
            if ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
                return redirect(route('ShippingServiceProfile'))->with('success', 'Kata sandi berhasil diperbarui!');
            }

            // If none of the above, assume the user is a customer
            return redirect(route('CustomerProfile'))->with('success', 'Kata sandi berhasil diperbarui!');
        } elseif ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
            return redirect(route('AdminProfile'))
                ->withErrors(['old_password' => 'Kata Sandi salah!'])
                ->withInput();
        } elseif ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
            return redirect(route('ShippingServiceProfile'))
                ->withErrors(['old_password' => 'Kata Sandi salah!'])
                ->withInput();
        } else {
            return redirect(route('CustomerProfile'))
                ->withErrors(['old_password' => 'Kata Sandi salah!'])
                ->withInput();
        }
    }

    public function update_profile_picture(UpdateProfilePictureRequest $request)
    {
        $userID = Auth::id();
        $user = User::find($userID);

        try {
            // Validate the request
            $validated = $request->validated();

            // Handle the image upload
            if (!$request->hasFile('image')) {
                Log::error('No image file found in the request');
                return response()->json(['success' => false, 'message' => 'Tidak ada file foto!'], 400);
            }

            $image = $request->file('image');
            $path = $image->store('public/uploads');

            // Update image path in the database
            $user->profilePicturePath = Storage::url($path);
            $user->save();

            return response()->json(['success' => true, 'filePath' => $user->profilePicturePath, 'message' => 'Foto profil berhasil diperbarui!']);
        } catch (\Exception $e) {
            Log::error('Error uploading image: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Gagal mengunggah foto profil!'], 500);
        }
    }
}
