<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
    }

    public function profile(Request $request)
    {
<<<<<<< Updated upstream
        $prefix = $request->segment(1);
        $data = User::find('01ee9554-9e84-367d-96ec-bf2a25b4cb3e');
        $id = $data->userID;
        $nama = $data->name;
        switch ($prefix) {
            case 'admin':
                return view('admin.profile',compact('data','id', 'nama'));
            case 'shipping-service':
                return view('shipping_service.profile',compact('data','id'));
            default:
                return view('customer.profile',compact('data','id'));
=======
        $user = $request->user();

        // Check if the user is an admin
        if ($user->userID == '01ee9554-9e84-367d-96ec-bf2a25b4cb3e') {
            return view('admin.profile');
>>>>>>> Stashed changes
        }

        // Check if the user is a shipping service
        if ($user->userID == '029ef8cd-7c30-3d78-a748-5ba3520cbb8b') {
            return view('shipping_service.profile');
        }

        // If none of the above, assume the user is a customer
        return view('customer.profile');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
        $data = User::find($id);
        if(!$data){
            redirect()->back()->withErrors(['errors' => 'Data Users Not Found']);
        }

        $validator = Validator::make($request->all(), [
            "name"    => "required|string|min:3",
            "gender" => "nullable",
            "phoneNum" => "nullable",
            "email" => "nullable",
            "age" => "nullable",
            "password" => "nullable",
        ]);

        $data->name = $request->name ? $request->name : $data->name;
        $data->gender = $request->gender ? $request->gender : $data->gender;
        $data->phoneNum = $request->phoneNum ? $request->phoneNum : $data->phoneNum;
        $data->email = $request->email ? $request->email : $data->email;
        $data->age = $request->age ? $request->age : $data->age;
        $data->update();

        return redirect('admin/profil')->with('message', "Data Successfully Updated");

    }


    public function updatePassword(Request $request, string $id)
    {
        $data = User::find($id);
        if(!$data){
            redirect()->back()->withErrors(['errors' => 'Data Users Not Found']);
        }

        $validator = Validator::make($request->all(), [
            "password" => "required",
        ]);

        if(Hash::check($request->password,$data->password)) {

            $data->password = $request->password ? bcrypt($request->password) : $data->password;
            $data->update();

        } else {
            return redirect('admin/profil')->with('message', "Password Lama salah");
        }

        return redirect('admin/profil')->with('message', "Data Successfully Updated");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }    
}
