<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    // Show All Brands Function //
    public function index()
    {
        return view('backend.brands.index');
    }
    // Show All Brands Function //

    // Create Brands Function //
    public function create()
    {
        return view('backend.brands.create');
    }
}
