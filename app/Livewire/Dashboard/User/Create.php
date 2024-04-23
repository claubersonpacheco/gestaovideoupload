<?php

namespace App\Livewire\Dashboard\User;

use App\Livewire\Forms\UserForm;
use Livewire\Component;

class Create extends Component
{

    public UserForm $form;
    public function save()
    {
         $this->form->store();
    }
    public function cancel()
    {
        return redirect()->route('users.index');
    }
    public function render()
    {
        return view('livewire.dashboard.user.create');
    }
}
