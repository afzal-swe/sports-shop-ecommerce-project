<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    // Show All Brands Function //
    public function index()
    {
        $brand = Brand::all();
        return view('backend.brands.index', compact('brand'));
    }
    // Show All Brands Function //

    // Create Brands Function //
    public function create()
    {
        return view('backend.brands.create');
    }
    // Create Brands Function //

    // Store Brands Function //
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands|max:25',
        ]);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::of($request->brand_name)->slug('-'),
            'brand_status' => $request->brand_status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array('message' => 'Add Brand Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
