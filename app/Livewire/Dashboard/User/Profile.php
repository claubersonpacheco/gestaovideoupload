<?php

namespace App\Livewire\Dashboard\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public UserForm $form;


    public $id;

    public $data;

    public $action;

    public $title;

    #[On('updatePhoto')]
    public function mount():void
    {
        $user = Auth::user();

        $this->form->setUser($user);

        $this->id = $user->id;

        $this->data = $user;

        $this->action = 'profile';

        $this->title = 'Profile';


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

    public function render()
    {
        return view('livewire.dashboard.user.profile');
    }
}
