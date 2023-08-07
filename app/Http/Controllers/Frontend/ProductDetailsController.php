<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDetailsController extends Controller
{
    //
    public function product_details($id)
    {

        $details = Product::findOrFail($id);

        return view('frontend.product_details.index', compact('details'));
    }
}
