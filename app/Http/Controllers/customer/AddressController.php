<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $userID = Auth::id();
        $user = User::find($userID);
        $addresses = $user->address;

        $addresses = Address::orderBy('created_at', 'desc')->get();

        $provinces = Province::all();
        $regencies = Regency::all(); 
        $districts = District::all(); 

        

        return view('customer.addaddres',compact('addresses','provinces','regencies','districts', 'user'));
    }

    public function getRegencies($provinsi_id)
    {
        // dd("jhvjbb");
        Log::info('Fetching regencies for province_id: ' . $provinsi_id); // Debugging
        $regencies = Regency::where('province_id', $provinsi_id)->pluck('name', 'id');
        Log::info('Regencies: ' . $regencies); // Debugging
        return response()->json(['regencies' => $regencies]);
    }

    public function getDistricts($kota_id)
    {
        Log::info('Fetching districts for kota_id: ' . $kota_id); // Debugging
        $districts = District::where('regency_id', $kota_id)->pluck('name', 'id');
        Log::info('Districts: ' . $districts); // Debugging
        return response()->json(['districts' => $districts]);
    }

    public function store(Request $request)
        {   
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'nomor_telepon' => 'required|numeric|digits_between:11,15',
            'province' => 'required|',
            'city' => 'required|',
            'district' => 'required|',
            'alamat_lengkap' => 'required|string|max:255',
            'deskripsi_alamat' => 'nullable|string|max:255',
        ],
        [
            'nama_tempat.required' => 'Nama Tempat harus diisi',
            'nama_penerima.required' => 'Nama Penerima harus diisi',
            'nomor_telepon.required' => 'Nomor Telepon harus diisi',
            'nomor_telepon.numeric' => 'Nomor Telepon harus berupa angka',
            'nomor_telepon.digits_between' => 'Nomor Telepon harus antara 11 hingga 13 angka',
            'province.required' => 'Provinsi harus diisi',
            'city.required' => 'Kota/Region harus diisi',
            'district.required' => 'Kecamatan harus diisi',
            'alamat_lengkap.required' => 'Alamat Lengkap harus diisi',
            'deskripsi_alamat.required' => 'Deskripsi Alamat harus diisi',
        ]);

        $userID = Auth::id();

        $provinceName = Province::find($request->province)->name;
        $cityName = Regency::find($request->city)->name;
        $districtName = District::find($request->district)->name;

        $address = new Address();
        $address->userID = $userID;
        $address->nameAddress = $request->nama_tempat;
        $address->receiver = $request->nama_penerima;
        $address->phoneNum = $request->nomor_telepon;
        $address->province = $provinceName;
        $address->cityOrRegency = $cityName;
        $address->ward = $districtName;
        $address->detailAddress = $request->alamat_lengkap;
        $address->description = $request->deskripsi_alamat;

        $address->save();

        return redirect()->route('alamat-saya.index')->with('success', 'Alamat berhasil ditambahkan');
        }

       // AddressController.php
    
       public function getAddress($id)
       {
           $address = Address::find($id);
           return response()->json($address);
       }
   
       public function updateAddress(Request $request, $id)
    {
        $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'nama_penerima' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'provinsi' => 'required|integer',
            'kota' => 'required|integer',
            'kecamatan' => 'required|integer',
            'alamat_lengkap' => 'required|string',
            'deskripsi_alamat' => 'nullable|string',
        ]);

        $provinceName = Province::find($request->input('provinsi'))->name;
        $cityName = Regency::find($request->input('kota'))->name;
        $districtName = District::find($request->input('kecamatan'))->name;

        $address = Address::findOrFail($id);
        $address->nameAddress = $request->input('nama_tempat');
        $address->receiver = $request->input('nama_penerima');
        $address->phoneNum = $request->input('nomor_telepon');
        $address->province = $provinceName;
        $address->cityOrRegency = $cityName;
        $address->ward = $districtName;
        $address->detailAddress = $request->input('alamat_lengkap');
        $address->description = $request->input('deskripsi_alamat');

        $address->save();

        return redirect()->route('alamat-saya.index')->with('success', 'Address updated successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
}
