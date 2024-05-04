<?php

namespace App\Livewire\Forms;

use App\Models\Folder;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Video;

class VideoForm extends Form
{

    public ?Video $video;

    public $name = '';

    public $folder;

    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('videos')->ignore($this->video),
            ],
            'folder' => 'required',
        ];
    }


    public function setVideo(Video $video)
    {

        $this->video = $video;

        $this->name = $video->name;
        $this->folder = $video->folder_id;


    }

    public function store()
    {

        $this->validate();

        $bunnyVideo = new Video();


        $resBunny = $bunnyVideo->createVideoInBunny($this->name);

        if($resBunny->guid != "") {
            $return = Video::create([
                            'name' => $this->name,
                            'folder_id' => $this->folder,
                            'guid' => $resBunny->guid,
                            'videoLibraryId' => $resBunny->videoLibraryId,
                        ]
            );

            return redirect()->route('videos.upload', $return->id);

        }else{

            return false;

        }

    }

    public function update()
    {

        $this->validate();

        $bunnyVideo = new Video();

        $resBunny = $bunnyVideo->updateVideoInBunny($this->name, $this->video->guid);

        if($resBunny->success === true) {
            $this->video->update(
                    [
                        'name' => $this->name,
                        'folder_id' => $this->folder,
                    ]
            );

            toastr()->success('Atualizado com sucesso!');

            return redirect()->route('videos.index');


        }else{

            return false;

        }


    }
}
