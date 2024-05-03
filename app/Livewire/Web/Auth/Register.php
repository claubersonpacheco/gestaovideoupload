<?php

namespace App\Livewire\Web\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class Register extends Component
{
    public $username;

    public function save()
    {
        dd($this->username);

    }
    public function render()
    {
        return view('livewire.web.auth.register');
    }
}
