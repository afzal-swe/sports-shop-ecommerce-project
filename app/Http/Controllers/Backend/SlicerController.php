<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class SlicerController extends Controller
{
    //
    public function index()
    {
        $slider = Slider::orderBy('id', 'DESC')->get();
        return view('backend.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('backend.slider.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'slider_image' => 'required',
        // ]);

        if ($request->file('slider_image')) {
            $img = $request->file('slider_image');

            $name_gen = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)->resize(500, 500)->save('image/slider_image/' . $name_gen);

            $img_url = 'image/slider_image/' . $name_gen;

            Slider::insert([
                'slider_image' => $img_url,
                'status' => $request->status,
                'created_at' => Carbon::now(),
            ]);
            $notification = array('message' => 'New Slider Added Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            $notification = array('message' => 'Image Not Added Please Try Again', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }

    public function destroy($id)
    {
        $f_image = Slider::findOrFail($id);

        $d_image = $f_image->slider_image;

        if ($d_image == NULL) {

            Slider::findOrFail($id)->delete();

            $notification = array('message' => 'Slider Image Delete Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            unlink($d_image);
            Slider::findOrFail($id)->delete();

            $notification = array('message' => 'Slider Image Delete Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
