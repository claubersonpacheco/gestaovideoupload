<?php

namespace App\Livewire\Dashboard\Video;


use App\Livewire\Forms\VideoForm;
use App\Models\Video;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Edit Video')]
class Edit extends Component
{

    public VideoForm $form;


    public function mount(int|string $record)
    {
        $video = Video::findOrFail($record);

        $this->form->setVideo($video);

    }

    public function save()
    {
        $this->form->update();

    }

    public function cancel()
    {
        return redirect()->route('videos');
    }

    public function render()
    {
        return view('livewire.dashboard.video.edit');
    }
}
