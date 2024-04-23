<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{

    public ?Role $role;


    #[Validate('required|min:4|unique:videos,name')]
    public $name = '';

    #[Validate('required|min:4')]
    public $description = '';


    public function setRole(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->description = $role->description;

    }

    public function store()
    {

        $this->validate();

        Role::create([
                'name' => $this->name,
                'description' => $this->description,
                ]
            );

        toastr()->success('Criado com sucesso!');

        return redirect()->route('roles.index');

    }

    public function update()
    {

        $this->validate();

        $this->role->update(
                $this->only([
                    'name',
                    'description'
                ])
            );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('roles.index');


    }
}
