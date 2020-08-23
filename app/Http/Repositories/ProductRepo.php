<?php 
namespace App\Http\Repositories;

use App\Product;

class ProductRepo {
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll() {
        return $this->product->all();
    }

    public function getById($id) {
        return $this->product->findOrFail($id);
    }

    public function save($product) {
        $product->save();
    }

    public function delete($product) {
        $product->delete();
    }

}