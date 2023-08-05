<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    //
    public function index()
    {
        $subcategory = Subcategory::orderBy('id', 'DESC')->get();
        return view('backend.subcategory.index', compact('subcategory'));
    }

    public function create()
    {
        $brand = Brand::where('brand_status', '=', '1')->get();
        $category = Category::where('category_status', '=', '1')->get();
        return view('backend.subcategory.create', compact('brand', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        Subcategory::insert([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
            'subcategory_status' => $request->subcategory_status,
            'created_at' => Carbon::now(),
        ]);
        $notification = array('message' => 'Add Subcategory Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function active(Request $request)
    {
        $update = $request->id;

        Subcategory::findOrFail($update)->update([
            'subcategory_status' => '0',
        ]);
        $notification = array('message' => 'Subcategory Unactive Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function unactive(Request $request)
    {
        $update = $request->id;

        Subcategory::findOrFail($update)->update([
            'subcategory_status' => '1',
        ]);
        $notification = array('message' => 'Subcategory Active Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
