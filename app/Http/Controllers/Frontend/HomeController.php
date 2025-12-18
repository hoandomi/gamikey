<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('frontend.home.home');
    }

    public function searchItem(Request $request) {
        $search = $request->search;
        // Get 8 products that are active and have the search keyword in their name
        $products = Product::where('status', 1)->where('name', 'like', '%'.$search.'%')->select('id', 'name', 'price', 'image','slug')->get(8);

        return response(['products' => $products, 'status' => 'success']);
    }
}


