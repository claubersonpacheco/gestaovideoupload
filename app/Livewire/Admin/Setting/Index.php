<?php

namespace App\Livewire\Admin\Setting;

use App\Livewire\Forms\SettingForm;
use App\Models\Setting;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('SetUp')]
class Index extends Component
{
    use WithFileUploads;

    public SettingForm $form;

    public $id;

    public $data;



    public function mount(int|string $id):void
    {
        $this->data = Setting::findOrFail($id);

        $this->form->setSetting($this->data);
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
        return view('livewire.admin.setting.index');
    }
}
