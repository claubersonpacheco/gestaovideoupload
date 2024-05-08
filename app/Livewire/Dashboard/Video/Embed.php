<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;
use LivewireUI\Modal\ModalComponent;

class Embed extends ModalComponent
{
    public $video;


    public $videoid;

    public function mount()
    {

        $this->video = Video::find($this->videoid);
    }

    public function render()
    {
        return view('livewire.dashboard.video.embed');
    }
}
