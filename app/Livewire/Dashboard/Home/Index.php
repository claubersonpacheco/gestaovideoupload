<?php

namespace App\Livewire\Dashboard\Home;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $countUsers;
    public function render()
    {
        $this->countUsers = User::count();


        return view('livewire.dashboard.home.index');
    }
}
