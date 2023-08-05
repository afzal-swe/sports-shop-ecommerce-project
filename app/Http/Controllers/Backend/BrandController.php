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
        $brand = Brand::orderBy('id', 'DESC')->get();
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

    public function active(Request $request)
    {
        $update = $request->id;

        Brand::findOrFail($update)->update([
            'brand_status' => '0',
        ]);
        $notification = array('message' => 'Brand Unactive Successfully', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    public function unactive(Request $request)
    {
        $update = $request->id;

        Brand::findOrFail($update)->update([
            'brand_status' => '1',
        ]);
        $notification = array('message' => 'Brand Active Successfully', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }

    public function destroy($id)
    {

        Brand::findOrFail($id)->delete();

        $notification = array('message' => 'Brand Delete Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {
        $edit = Brand::findOrFail($id);
        return view('backend.brands.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $update = $request->id;

        Brand::findOrFail($update)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' => Str::of($request->brand_name)->slug('-'),
            'brand_status' => $request->brand_status,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array('message' => 'Brand Update Successfully', 'alert-type' => 'success');
        return redirect()->route('brand.index')->with($notification);
    }
}
