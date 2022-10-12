<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CheckoutController extends Component
{
    public function render()
    {
        return view('livewire.checkout-controller')->layout('layouts.base');;
    }
}
