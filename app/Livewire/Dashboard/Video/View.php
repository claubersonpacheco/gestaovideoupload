<?php

namespace App\Livewire\Dashboard\Video;

use App\Models\Video;


use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class View extends Component
{

    public $record;

    public function getVideo($record)
    {

        $video = Video::findOrFail($record);

        $fileContents = Storage::disk('local')->get($video->file_path);
        $response = Response::make($fileContents, 200);
        $response->header('Content-Type', "video/mp4");
        return $response;

    }

    #[Title('View Video')]
    public function render()
    {

        $video = Video::findOrFail($this->record);

        return view('livewire.dashboard.video.view', [
            'video' => $video
        ]);
    }
}
