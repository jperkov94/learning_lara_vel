<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardController extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-controller')->layout('layouts.base');
    }
}
