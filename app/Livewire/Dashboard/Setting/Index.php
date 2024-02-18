<?php

namespace App\Livewire\Dashboard\Setting;

use App\Livewire\Forms\SettingForm;
use App\Models\Setting;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('SetUp')]
class Index extends Component
{
    public SettingForm $form;

    public $id;

    public function mount(int|string $id):void
    {

        $data = Setting::findOrFail($id);

        $this->form->setSetting($data);
    }

    public function save()
    {
        $this->form->update($this->id);

    }

    public function cancel()
    {
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.dashboard.setting.index');
    }
}
