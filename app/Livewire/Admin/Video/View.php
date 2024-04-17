<?php

namespace App\Livewire\Admin\Video;

use App\Models\Video;


use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;

class View extends Component
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

    #[Title('View Video')]
    public function render()
    {

        $video = Video::findOrFail($this->id);

        return view('livewire.admin.video.view', [
            'video' => $video
        ]);
    }
}
