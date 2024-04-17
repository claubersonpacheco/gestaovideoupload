<?php

namespace App\Livewire\Admin\Role;

use App\Livewire\Forms\RoleForm;
use App\Livewire\Forms\VideoForm;
use Livewire\Component;

class Create extends Component
{
    public RoleForm $form;

    public function save():void
    {
        $this->form->store();
    }

    public function cancel()
    {
        return redirect()->route('roles');
    }

    public function render()
    {
        return view('livewire.admin.role.create');
    }
}
