<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function chackout_login()
    {

        if (Auth::user()) {
            return view('frontend.checkout.view');
        } else {
            return view('auth.login');
        }
    }
}
