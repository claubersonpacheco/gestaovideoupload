<?php

namespace App\Livewire\Admin\User;

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
        return redirect()->route('users');
    }
    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
