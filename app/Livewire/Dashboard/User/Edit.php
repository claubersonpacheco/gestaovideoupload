<?php

namespace App\Livewire\Dashboard\User;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Edit extends Component
{
    public function render()
    {
        return view('livewire.dashboard.user.edit');
    }
}
