<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Video;

class VideoForm extends Form
{

    public ?Video $video;


    #[Validate('required|min:5|unique:videos,name')]
    public $name = '';


    public function setVideo(Video $video)
    {

        $this->video = $video;

        $this->name = $video->name;


    }

    public function store()
    {

        $this->validate();

        $bunnyVideo = new Video();

        $resBunny = $bunnyVideo->createVideoInBunny($this->name);

        if($resBunny->guid != "") {
            $return = Video::create([
                            'name' => $this->name,
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
                $this->only([
                    'name'
                ])
            );

            toastr()->success('Atualizado com sucesso!');

            return redirect()->route('videos');


        }else{

            return false;

        }


    }
}
