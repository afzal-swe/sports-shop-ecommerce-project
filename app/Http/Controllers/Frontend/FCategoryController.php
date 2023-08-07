<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class FCategoryController extends Controller
{
    //
    public function show_category_product($id)
    {
        $category = Category::where('category_status', '=', '1')->orderBy('id', 'DESC')->limit(9)->get();
    }
}
