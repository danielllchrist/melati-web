<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageLandingPageController extends Controller
{
    public function index() {
        return view('admin.manageasset');
    }

    public function managecarousel() {
        return view('admin.carouselmanager');
    }
}
