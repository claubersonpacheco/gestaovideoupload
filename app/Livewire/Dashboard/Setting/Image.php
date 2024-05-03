<?php

namespace App\Livewire\Dashboard\Setting;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Image extends ModalComponent
{
    use WithFileUploads;

    public $id;

    #[Validate('required|image|max:2048|mimes:png,jpg,jpeg')]
    public $image;

    public $rand;

    public $config;

    public function updateImage()
    {

        $this->validate();

        $resUser = Setting::findOrFail($this->config);

            // verify if exists files
            $existe = Storage::exists('/livewire-tmp/'.$this->image->getFilename());

            //if true, rename file and save in database
            if($existe === true){

                $imgName = md5($this->image . microtime()) . '.' . $this->image->extension();

                $this->image->storeAs('images/logo', $imgName);

                $resUser->update(
                    [
                        'logo' => $imgName
                    ]
                );

                // delete file in livewire-tmp
                Storage::delete('/livewire-tmp/'.$this->image->getFilename());

                toastr()->success('Atualizado com sucesso!');

                $this->resetInput();
                $this->dispatch('listConfig', id: $this->config);

            }


    }

    public function resetInput()
    {
        $this->image = null;
        $this->rand++;

        $this->closeModal();


    }

    public function render()
    {

        return view('livewire.dashboard.setting.image');
    }
}
