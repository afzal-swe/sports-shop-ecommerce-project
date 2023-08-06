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

    public function destroy($id)
    {

        $d_img = Product::findOrFail($id);
        $delete_image = $d_img->image;

        if ($delete_image == Null) {

            Product::findOrFail($id)->delete();

            $notification = array('message' => 'Product Delete Without Image Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            unlink($delete_image);

            Product::findOrFail($id)->delete();

            $notification = array('message' => 'Product Delete Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function active(Request $request)
    {

        $unactive = $request->id;

        Product::findOrFail($unactive)->update([
            'status' => '0',
        ]);
        $notification = array('message' => 'Product Unactive Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function unactive(Request $request)
    {

        $active = $request->id;

        Product::findOrFail($active)->update([
            'status' => '1',
        ]);
        $notification = array('message' => 'Product Active Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function edit($id)
    {

        $brand = Brand::all();
        $category = Category::all();
        $subcategory = Subcategory::all();

        $edit = Product::findOrFail($id);

        return view('backend.product.edit', compact('brand', 'category', 'subcategory', 'edit'));
    }


    public function update(Request $request)
    {
        $update = $request->id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $file->getClientOriginalExtension();

            Image::make($file)->resize(430, 327)->save('image/product/' . $name_gen);

            $save_url = 'image/product/' . $name_gen;

            Product::findOrFail($update)->update([
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
                'image' => $save_url,
                'description' => $request->description,
                'slug' => Str::of($request->title)->slug('-'),
                'updated_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Update Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            Product::findOrFail($update)->update([
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
                'description' => $request->description,
                'slug' => Str::of($request->title)->slug('-'),
                'updated_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'Product Update Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
