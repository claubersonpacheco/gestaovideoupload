<?php

namespace App\Livewire\Dashboard\Role\RolePermission;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissions extends ModalComponent
{

    public $permissions;

    public $id;

    public $name;

    public int $role;


    public function mount():void
    {
        $role = Role::findById($this->role);

        $this->permissions = Permission::withoutRole($role->name)->get();

    }

    public function assingPermission()
    {
        $role = Role::findById($this->role);
        $role->givePermissionTo($this->name);

        $this->closeModal();
        $this->dispatch('listPermission');

    }

    public function render()
    {
        return view('livewire.dashboard.role.role-permission.assign-permissions');
    }
}
