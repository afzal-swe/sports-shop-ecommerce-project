<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cagegory;

class CategoryController extends Controller
{
    //  All Category Show Function //
    public function index()
    {
        return view('backend.category.index');
    }
    //  All Category Show Function //

    //  Category Create Function //
    public function create()
    {
        return view('backend.category.create');
    }
}
