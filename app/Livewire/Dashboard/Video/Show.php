<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;


use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{

    public $id;

    public function getVideo($id)
    {

        $video = Video::findOrFail($id);

        $fileContents = Storage::disk('local')->get($video->file_path);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;

    }

    #[Title('Show Video')]
    public function render()
    {

        $video = Video::findOrFail($this->id);

        return view('livewire.dashboard.video.show', [
            'video' => $video
        ]);
    }
}
