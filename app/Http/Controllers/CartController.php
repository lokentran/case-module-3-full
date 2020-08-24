<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use Session;
use App\Customer;
use App\Bill;

class CartController extends Controller
{
    public function getCart() {
        return view('frontend.cart.detail');
    }

    public function addCart(Request $request, $id) {
 
       
        $product = Product::findOrFail($id);
        $oldCart = $request->session()->get('cart');
        $newCart = new Cart($oldCart);

        $newCart->addToCart($id, $product, $request->quantity);
        $request->session()->put('cart', $newCart);
        
        // dd($oldCart);

        return redirect()->route('cart.index');
    }

    public function confirmCart() {
        return view('frontend.cart.confirm');
    }

    public function payment(Request $request) {
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        $bill = new Bill();
        $bill->customer_id = $customer->id;
        $bill->totalPrice = Session::get('cart')->totalPrice;
        $bill->save();
        
        foreach (Session::get('cart')->items as $key => $item) {
            $bill->products()->sync($item['product']->id);
        }
        $request->session()->forget('cart');
        return redirect()->back();
        
    }

}

