<?php

namespace App\Livewire\Dashboard\User;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Create extends Component
{

    public UserForm $form;

    public $action = 'store';
    public $title = 'Create User';
    public $data = null;

    public function render()
    {
        return view('livewire.dashboard.user.create');
    }
}
