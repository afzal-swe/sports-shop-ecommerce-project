<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class AddToCartController extends Controller
{
    //
    public function index()
    {
        $cart = Cart::all();
        return view('backend.add_to_cart.index', compact('cart'));
    }
}
