<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class Photo extends ModalComponent
{
    use WithFileUploads;

    public $id;

    #[Validate('required|image|max:2048|mimes:png,jpg,jpeg')]
    public $photo;

    public $rand;

    public $user;

    public function updatePhoto()
    {

        $this->validate();

        $resUser = User::findOrFail($this->user);

            // verify if exists files
            $existe = Storage::exists('/livewire-tmp/'.$this->photo->getFilename());

            //if true, rename file and save in database
            if($existe === true){

                $imgName = md5($this->photo . microtime()) . '.' . $this->photo->extension();

                $this->photo->storeAs('images/user', $imgName);

                $resUser->update(
                    [
                        'photo' => $imgName
                    ]
                );

                // delete file in livewire-tmp
                Storage::delete('/livewire-tmp/'.$this->photo->getFilename());

                toastr()->success('Atualizado com sucesso!');

                $this->resetInput();
                $this->dispatch('updatePhoto', id: $this->user);

            }


    }

    public function resetInput()
    {
        $this->photo = null;
        $this->rand++;

        $this->closeModal();


    }

    public function render()
    {

        return view('livewire.admin.user.photo');
    }
}
