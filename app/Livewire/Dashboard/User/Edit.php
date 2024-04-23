<?php

namespace App\Livewire\Dashboard\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Dotenv\Store\File;

class Edit extends Component
{
    use WithFileUploads;

    public UserForm $form;

    public $data;

    #[On('updatePhoto')]
    public function mount($id):void
    {
        $data = User::findOrFail($id);

        $this->form->setUser($data);

        $this->data = $data;

    }
    public function save():void
    {
        $this->form->update();
    }

    public function deletePhoto(User $user):void
    {


        $verifica = Storage::exists('images/user/'.$user->photo);

        $rota = 'images/user/'.$user->photo;

        if($verifica === true){

           Storage::disk('public')->delete([$rota]);

            $user->update(
                ['photo' => '']
            );

            $this->dispatch('updatePhoto', id: $user->id);

        }else{
            toastr()->error('Erro ao excluir!');

        }



    }
    public function cancel()
    {
        return redirect()->route('users.index');
    }


    public function render()
    {
        return view('livewire.dashboard.user.edit');
    }
}
