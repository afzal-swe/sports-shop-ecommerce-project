<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipping;
use Illuminate\Support\Carbon;
use App\Models\Cart;

class CheckoutController extends Controller
{
    //
    public function chackout_login()
    {

        if (Auth::user()) {
            return view('frontend.checkout.create');
        } else {
            return view('auth.login');
        }
    }

    public function shipping(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);

        $user = Auth::user();

        Shipping::insert([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'created_at' => Carbon::now(),
        ]);

        $notification = array('message' => 'Shipping Successfully', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
