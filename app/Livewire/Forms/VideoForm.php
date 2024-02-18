<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Video;

class VideoForm extends Form
{

    public ?Video $video;


    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('min:5')]
    public $collection = '';

    #[Validate('nullable|max:300')]
    public $description = '' ;



    public function setVideo(Video $video)
    {

        $this->video = $video;

        $this->name = $video->name;
        $this->collection = $video->collection;
        $this->description = $video->description;

    }

    public function store()
    {

        $this->validate();

        $bunnyVideo = new Video();

        $resBunny = $bunnyVideo->createVideoInBunny($this->name);

        if($resBunny->guid != "") {
            Video::create([
                    'name' => $this->name,
                    'description' => $this->description,
                    'collection' => $this->collection,
                    'guid' => $resBunny->guid,
                    'videoLibraryId' => $resBunny->videoLibraryId,
                ]
            );
        }else{
            session()->flash('error', 'Erro ao fazer criar!');

            return redirect()->route('videos');

        }

        session()->flash('message', 'Create with success!');

        return redirect()->route('videos');
    }



    public function update()
    {

        $this->validate();

        $this->video->update(
            $this->only([
                'name', 'description', 'collection'
            ])
        );

        session()->flash('message', 'Update with success!');

        return redirect()->route('video');
    }
}
