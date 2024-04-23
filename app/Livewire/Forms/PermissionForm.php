<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;


class PermissionForm extends Form
{

    public ?Permission $permission;


    #[Validate('required|min:3|unique:permissions,name')]
    public $name = '';

    #[Validate('required|min:3')]
    public $description = '';


    public function setPermission(Permission $permission)
    {
        $this->permission = $permission;
        $this->name = $permission->name;
        $this->description = $permission->description;

    }

    public function store()
    {
        $this->validate();

        Permission::create([
                'name' => $this->name,
                'description' => $this->description
                ]
            );

        toastr()->success('Criado com sucesso!');

        return redirect()->route('permissions.index');

    }

    public function update()
    {

        $this->validate();

        $this->permission->update(
                $this->only([
                    'name',
                    'description'
                ])
            );

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('permissions.index');


    }
}
