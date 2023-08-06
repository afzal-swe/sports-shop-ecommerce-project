<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::orderBy('id', 'DESC')->get();
        return view('backend.product.index', compact('product'));
    }

    public function create()
    {
        $brand = Brand::where('brand_status', '=', '1')->get();
        $category = Category::where('category_status', '=', '1')->get();
        $subcategory = Subcategory::where('subcategory_status', '=', '1')->get();
        return view('backend.product.create', compact('brand', 'category', 'subcategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'post_date' => 'required',
        ]);

        if ($request->file('image')) {
            $img = $request->file('image');

            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            Image::make($img)->resize(430, 327)->save("image/product/" . $name_gen);

            $save_img_url = "image/product/" . $name_gen;

            Product::insert([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'discount_price' => $request->discount_price,
                'post_date' => $request->post_date,
                'tags' => $request->tags,
                'color' => $request->color,
                'size' => $request->size,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $save_img_url,

                'slug' => Str::of($request->title)->slug('-'),
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Added Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            Product::insert([
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'title' => $request->title,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'discount_price' => $request->discount_price,
                'post_date' => $request->post_date,
                'tags' => $request->tags,
                'color' => $request->color,
                'size' => $request->size,
                'status' => $request->status,
                'description' => $request->description,
                'slug' => Str::of($request->title)->slug('-'),
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Added Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
