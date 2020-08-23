<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Services\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = $this->productService->getAll();
        return view('backend.product.list', compact('products','categories'));
    }

    public function create()
    {   
        $categories = Category::all();
        return view('backend.product.add',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->productService->add($request);
        return redirect()->route('products.index');
    }
}
