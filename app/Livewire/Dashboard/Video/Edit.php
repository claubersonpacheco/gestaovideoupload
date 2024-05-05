<?php

namespace App\Livewire\Dashboard\Video;


use App\Livewire\Forms\VideoForm;
use App\Models\Folder;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Edit Video')]
class Edit extends Component
{

    public VideoForm $form;


    public $folders;

    public $video;


    public function mount(int|string $id)
    {
        $this->video = Video::findOrFail($id);

        $this->form->setVideo($this->video);

        $this->folders = Folder::all();

    }

    public function save()
    {

        $this->form->update();

    }

    public function cancel()
    {
        return redirect()->route('videos.index');
    }

    public function render()
    {
        return view('livewire.dashboard.video.edit');
    }
}
