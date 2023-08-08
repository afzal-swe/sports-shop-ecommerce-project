<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Facades\Session;
use Darryldecode\Cart\Cart;

class Add_To_CartController extends Controller
{
    //
    public function add_to_cart(Request $request)
    {
        $add_cart = $request->id;
        $Product = Product::findOrFail($add_cart);
        $quantity = $request->quantity;

        // $userId = $request->session()->get($add_cart)->id;

        // add the product to cart
        $cart = Cart::session($add_cart)->add(array(
            'id' => '202',
            'name' => $Product->name,
            'price' => $Product->price,
            'quantity' => $request->quantity,
            'attributes' => array(),
        ));
        dd($cart);
        // $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
        // return redirect()->back()->with($notification);
    }

    // public function view_cart(Request $request){
    //     $userId = $request->session()->get($add_cart)->id;
    // }
}
