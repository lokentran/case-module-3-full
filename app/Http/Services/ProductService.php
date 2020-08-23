<?php 
namespace App\Http\Services;

use App\Http\Repositories\ProductRepo;
use App\Product;

class ProductService {
    protected $productRepo;

    public function __construct(ProductRepo $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function getAll() {
        return $this->productRepo->getAll();
    }

    public function getById($id) {
        return $this->productRepo->getById($id);
    }

    public function add($request) {
        $product = new Product();
        $product->fill($request->all());
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images','public');
            $product->img = $path;
        }

        $this->productRepo->save($product);
        
    }


}

