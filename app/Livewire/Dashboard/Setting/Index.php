<?php

namespace App\Livewire\Dashboard\Setting;

use App\Livewire\Forms\SettingForm;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Config')]
class Index extends Component
{
    use WithFileUploads;

    public SettingForm $form;

    public $id;

    public $data;



    #[On('listConfig')]
    public function mount(int $id):void
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
        return redirect()->route('dashboard.index');
    }

    public function deleteImage(Setting $config):void
    {


        $verifica = Storage::exists('images/logo/'.$config->logo);

        $rota = 'images/logo/'.$config->logo;

        if($verifica === true){

            Storage::disk('public')->delete([$rota]);

            $config->update(
                ['logo' => '']
            );


            $this->dispatch('listConfig', id: $config->id);

        }else{
            toastr()->error('Erro ao excluir!');

        }



    }

    public function render()
    {
        return view('livewire.dashboard.setting.index');
    }
}
