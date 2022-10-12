<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;



class ShopController extends Component
{
    public $sorting = "default";
    public $pagesize = 6;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 6;
    }


    public function store($product_id, $product_name, $product_price)
    {

        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added to cart');
        return redirect()->route('cart.controller');
    }

    public function render()
    {


        if ($this->sorting == 'date') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        } else if ($this->sorting == 'price') {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
        } elseif ($this->sorting == 'price_desc') {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        } else {
            $products = Product::paginate($this->pagesize);
        }

        return view('livewire.shop-controller', ['products' => $products])->layout('layouts.base');;
    }
}
