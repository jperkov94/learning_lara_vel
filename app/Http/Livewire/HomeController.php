<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeController extends Component
{
    public function render()
    {
        return view('livewire.home-controller')->layout('layouts.base');
    }
}
