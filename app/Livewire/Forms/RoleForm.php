<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{

    public ?Role $role;


    #[Validate('required|min:5|unique:videos,name')]
    public $name = '';


    public function setRole(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;

    }

    public function store()
    {

        $this->validate();



        Role::create([
                'name' => $this->name,
                ]
            );

        toastr()->success('Criado com sucesso!');

        return redirect()->route('roles');

    }

    public function update()
    {

        $this->validate();

        $this->role->update(
                $this->only([
                    'name',
                ])
            );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('roles');


    }
}
