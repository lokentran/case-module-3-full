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



}

