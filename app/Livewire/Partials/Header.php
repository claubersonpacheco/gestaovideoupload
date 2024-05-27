<?php

namespace App\Livewire\Partials;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Header extends Component
{

    public $password;

    public function render()
    {
        return view('livewire.partials.header');
    }
}
