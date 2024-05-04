<?php

namespace App\Livewire\Dashboard\Video;

use App\Livewire\Forms\VideoForm;
use App\Models\Folder;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Form;

#[Title('Create Video')]
class Create extends Component
{

    public VideoForm $form;

    public function save():void
    {
        $this->form->store();
    }

    public function cancel()
    {
        return redirect()->route('videos.index');
    }

    public function render()
    {
        $folders = Folder::all();

        return view('livewire.dashboard.video.create', compact('folders'));
    }
}
