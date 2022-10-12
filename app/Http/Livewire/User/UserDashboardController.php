<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardController extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-controller')->layout('layouts.base');
    }
}
