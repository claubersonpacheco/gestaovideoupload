<?php

namespace App\Livewire\Dashboard\Permission;

use App\Livewire\Forms\PermissionForm;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public PermissionForm $form;

    public function mount(int|string $id)
    {
        $data = Permission::findById($id);

        $this->form->setPermission($data);
    }

    public function save()
    {
        $this->form->update();

    }

    public function cancel()
    {
        return redirect()->route('permissions.index');
    }

    public function render()
    {
        return view('livewire.dashboard.permission.edit');
    }
}
