<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class CategoryController extends Controller
{
    //  All Category Show Function //
    public function index()
    {
        return view('backend.category.index');
    }
    //  All Category Show Function //

    //  Category Create Function //
    public function create()
    {
        $brand = Brand::all();
        return view('backend.category.create', compact('brand'));
    }
    //  Category Create Function //

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_name' => 'required',
        ]);

        Category::insert([
            'brand_id' => $request->brand_id,
            'category_name' => $request->category_name,
            'category_status' => $request->category_status,
            'category_slug' => Str::of($request->category_name)->slug('-'),
            'created_at' => Carbon::now(),
        ]);
        $notification = array('message' => 'Add Category Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
