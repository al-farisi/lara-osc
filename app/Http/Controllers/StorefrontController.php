<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StorefrontController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('id','DESC')->paginate(15);
        return view('welcome',compact('products'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }
}
