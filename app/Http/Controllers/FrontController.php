<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class FrontController extends Controller
{
    public function getIndex() {
        $products = Product::orderBy('id','desc')->take(8)->get();
        $categories = Category::all();
        return view('frontend.index', \compact('products','categories'));
    }
}
