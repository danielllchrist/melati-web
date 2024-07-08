<?php

namespace App\Http\Controllers;

use App\Models\ManageAsset;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $assets = ManageAsset::all();
        return view('customer.landingpage', compact('assets'));
    }
}
