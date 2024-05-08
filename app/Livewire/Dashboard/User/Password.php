<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as NewPassword;
use Livewire\Component;

class Password extends Component
{

    public $password;

    public $password_confirmation;

    public $id;

    public $user;


    public function mount()
    {
        $this->user = User::find($this->id);

    }
    public function rules()
    {
        $rules = [

            'password' => ['required', 'confirmed', NewPassword::min('8')->mixedCase()->uncompromised()->symbols()]
        ];

        return $rules;

    }

    public function save()
    {

        $this->validate();

        $user = User::find($this->id);

        $user->password = Hash::make($this->password);

        $user->save();

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('users.password', ['id' => $this->id]);
    }

    public function cancel()
    {
        return redirect()->route('users.index');
    }

    public function render()
    {
        return view('livewire.dashboard.user.password');
    }
}
