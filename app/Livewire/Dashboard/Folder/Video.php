<?php

namespace App\Livewire\Dashboard\Folder;

use App\Models\Folder;
use App\Models\Video as ModelVideo;
use Livewire\Component;

class Video extends Component
{
    public $videos;

    public $folder;

    public $id;

    public function mount(int $id): void
    {
        $folder = Folder::findOrFail($id);

        $this->folder = $folder;

        $videos = $folder->videos()->orderBy('created_at', 'desc')->get();

        $this->videos = $videos;
    }

    public function delete($id)
    {

        $data = ModelVideo::findOrFail($id);

        $data->delVideo($data->guid);

        $data->delete();

        toastr()->success('Deleted with successfully!');

        return redirect()->route('folders.video', $this->id );
    }

    public function render()
    {
        return view('livewire.dashboard.folder.video');
    }
}
