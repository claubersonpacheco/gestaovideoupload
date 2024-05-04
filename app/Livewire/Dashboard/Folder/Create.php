<?php

namespace App\Livewire\Dashboard\Folder;

use App\Livewire\Forms\FolderForm;
use Livewire\Component;

class Create extends Component
{

    public FolderForm $form;

    public function save():void
    {
        $this->form->store();
    }

    public function cancel()
    {
        return redirect()->route('folders.index');
    }
    public function render()
    {
        return view('livewire.dashboard.folder.create');
    }
}
