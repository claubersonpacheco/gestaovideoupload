<?php

namespace App\Livewire\Dashboard\Permission;

use App\Livewire\Forms\PermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{

    public PermissionForm $form;

    public function save():void
    {
        $this->form->store();
    }

    public function cancel()
    {
        return redirect()->route('permissions.index');
    }


    public function render()
    {
        return view('livewire.dashboard.permission.create');
    }
}
