<?php

namespace App\Livewire\Dashboard\User\RoleUser;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRole extends Component
{
    public $roles;

    public int $id;


    #[On('listRole')]
    public function mount():void
    {

        $userRole = User::findOrFail($this->id);

        $this->roles = $userRole->roles;

    }

    public function unsignedRole($id)
    {
        $user = User::findOrFail($this->id);

        $role = Role::findById($id);



        $user->removeRole($role->name);

        $this->dispatch('listRole');
    }

    public function render()
    {

        return view('livewire.dashboard.user.role-user.user-role');
    }
}
