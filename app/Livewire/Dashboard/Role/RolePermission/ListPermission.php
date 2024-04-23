<?php

namespace App\Livewire\Dashboard\Role\RolePermission;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ListPermission extends Component
{
    public $permissions;

    public $id;

    #[On('listPermission')]
    public function mount()
    {

        $rolePermission = Role::with(['permissions'])->findOrFail($this->id);
        $this->permissions = $rolePermission->permissions;

    }

    public function unsignedPermission($id)
    {
        $role = Role::findById($this->id);

        $permission = Permission::findById($id);

        $role->revokePermissionTo($permission->name);

        $this->dispatch('listPermission');
    }



    public function render()
    {
        return view('livewire.dashboard.role.role-permission.list-permission');
    }
}
