<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke(Request $request)
    {
        $products = Product::paginate(15);
    dd($products);
    return view('main', compact('products'));
    }
}
