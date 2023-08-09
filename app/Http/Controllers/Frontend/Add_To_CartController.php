<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class Add_To_CartController extends Controller
{
    //
    public function add_to_cart(Request $request, $id)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $product = Product::find($id);

            $cart = new Cart();
            $cart->user_name = $user->name;
            $cart->user_email = $user->email;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->product_id = $product->id;
            $cart->image = $product->image;

            $cart->save();

            $notification = array('message' => 'Add to Cart Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return redirect('login');
        }
    }

    public function cart_view()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart_view = Cart::where('user_id', '=', $id)->orderBy('id', 'DESC')->get();

            return view('frontend.add_to_cart.add_to_cart', compact('cart_view'));
        }
    }

    public function destroy($id)
    {

        Cart::findOrFail($id)->delete();

        $notification = array('message' => 'Cart to cart Cansel Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
