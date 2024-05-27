<?php

namespace App\Livewire\Partials;

use App\Models\User;
use Illuminate\Hashing\Bcrypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Http;

class AuthMoodle extends ModalComponent
{
    public $username;

    public $password;

    public function authMoodle()
    {
        $dataUser = Auth::user();

        $user = new User();

        $credentials = $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

    }
    public function render()
    {

        $this->username = Auth::user()->username;

        return view('livewire.partials.auth-moodle');
    }
}
