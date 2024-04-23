<?php

namespace App\Livewire\Dashboard\Role;

use App\Livewire\Forms\RoleForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{

    public RoleForm $form;

    public $id;

    public function mount(int $id)
    {
        $data = Role::findById($id);

        $this->form->setRole($data);
    }

    public function save()
    {
        $this->form->update();

    }

    public function cancel()
    {
        return redirect()->route('roles.index');
    }

    public function render()
    {
        return view('livewire.dashboard.role.edit');
    }
}
