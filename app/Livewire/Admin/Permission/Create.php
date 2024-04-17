<?php

namespace App\Livewire\Admin\Permission;

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
        return redirect()->route('permissions');
    }


    public function render()
    {
        return view('livewire.admin.permission.create');
    }
}
