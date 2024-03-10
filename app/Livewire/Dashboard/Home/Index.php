<?php

namespace App\Livewire\Dashboard\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.dashboard.home.index');
    }
}
