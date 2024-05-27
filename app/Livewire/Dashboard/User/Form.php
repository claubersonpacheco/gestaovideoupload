<?php

namespace App\Livewire\Dashboard\User;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Form extends Component
{

    public $form;

    public $action;

    public $data;

    public function mount($form, $action, $data)
    {
        $this->form = $form;
        $this->action = $action;
        $this->data = $data;

    }

    public function store()
    {
        $this->form->store();
    }

    public function update()
    {
        $this->form->update();
    }

    public function profile()
    {
        $this->form->profile();
    }

    public function cancel()
    {
        return redirect()->route('users.index');
    }


    public function render()
    {
        return view('livewire.dashboard.user.form');
    }
}
