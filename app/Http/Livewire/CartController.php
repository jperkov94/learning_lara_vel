<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CartController extends Component
{

    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }

    public function destroyProduct($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message', 'item has removed from cart');
    }

    public function destroyAll(){
        Cart::destroy();
    }

    public function render()
    {
        return view('livewire.cart-controller')->layout('layouts.base');
    }
}
