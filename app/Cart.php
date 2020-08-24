<?php 
namespace App;
class Cart {
    public $items=[];
    public $totalQuantity=0;
    public $totalPrice=0;

    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function addToCart($id,$product,$quantity=0) {
        $item = [
            'product'=>$product,
            'price'=> 0,
            'quantity'=> 0
        ];

        if(array_key_exists($id,$this->items)) {
            $item = $this->items[$id];
        }

        $item['quantity'] += $quantity;
        $item['price'] += $product->price * $quantity;
    
        $this->items[$id] = $item;
        $this->totalQuantity += $quantity;
        $this->totalPrice += $product->price * $quantity;
    }
    
}