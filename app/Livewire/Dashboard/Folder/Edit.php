<?php

namespace App\Livewire\Dashboard\Folder;

use App\Livewire\Forms\FolderForm;
use App\Models\Folder;
use Livewire\Component;

class Edit extends Component
{
    public FolderForm $form;

    public $folder;

    public function mount(int $id)
    {
        $this->folder = Folder::findOrFail($id);

        $this->form->setFolder($this->folder);
    }

    public function save()
    {
        $this->form->update();
    }

    public function cancel()
    {
        return redirect()->route('folders.index');
    }
    public function render()
    {
        return view('livewire.dashboard.folder.edit');
    }
}
