<?php

namespace App\Livewire\Admin\User\RoleUser;

use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleAssign extends ModalComponent
{

    public $roles;

    public $id;

    public $name;

    public int $user;


    public function mount():void
    {

        $this->roles = Role::whereDoesntHave('users', function ($query){
            $query->where('id', $this->user);
        })->get();

    }

    public function assignRole()
    {
        $user = User::findOrFail($this->user);

        $user->assignRole($this->name);

        $this->closeModal();
        $this->dispatch('listRole');

    }



    public function render()
    {
        return view('livewire.admin.user.role-user.user-role-assign');
    }
}
