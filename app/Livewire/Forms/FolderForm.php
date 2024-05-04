<?php

namespace App\Livewire\Forms;

use App\Models\Folder;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Video;

class FolderForm extends Form
{

    public ?Folder $folder;


    #[Validate('required|min:3|unique:folders,name')]
    public $name = '';

    public function setFolder(Folder $folder)
    {

        $this->folder = $folder;

        $this->name = $folder->name;


    }

    public function store()
    {

        $this->validate();

        Folder::create([
                'name' => $this->name,
            ]
        );

        toastr()->success('Criado com sucesso!');

        return redirect()->route('folders.index');

    }

    public function update()
    {

        $this->validate();

            $this->folder->update(
                $this->only([
                    'name'
                ])
            );

            toastr()->success('Atualizado com sucesso!');

            return redirect()->route('folders.index');

    }
}
