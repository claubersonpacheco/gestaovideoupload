<?php

namespace App\Livewire\Dashboard\Folder;

use App\Models\Folder;
use Livewire\Component;

class Video extends Component
{
    public $videos;

    public $folder;

    public function mount(int $id): void
    {
        $folder = Folder::findOrFail($id);

        $this->folder = $folder;

        $videos = $folder->videos()->orderBy('created_at', 'desc')->get();

        $this->videos = $videos;
    }

    public function render()
    {
        return view('livewire.dashboard.folder.video');
    }
}
