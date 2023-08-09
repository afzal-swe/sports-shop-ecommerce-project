<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.layouts.partial.body');
    }
    public function login_function()
    {
        $usertype = Auth::user()->usertype;

        if ($usertype == '1') {
            return view('backend.layouts.main');

            $notification = array('message' => 'Supper Login Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        } else {
            return view('frontend.layouts.partial.body');

            $notification = array('message' => 'User Login Successfully', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }
    }
}
