<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Services\ProductService;
use App\Requests\ProductRequest;

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

    public function store(ProductRequest $request)
    {
        $this->productService->add($request);
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $product = $this->productService->getById($id);
        return view('backend.product.edit',compact('product','categories'));
    }

    public function update(Request $request, $id)
    {   
        $this->productService->update($request, $id);
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $this->productService->destroy($id);
        return redirect()->route('products.index');
    }
}
