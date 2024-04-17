<?php

namespace App\Livewire\Admin\Permission;

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
        return redirect()->route('permissions');
    }

    public function render()
    {
        return view('livewire.admin.permission.edit');
    }
}
