<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Setting;

class SettingForm extends Form
{

    public ?Setting $setting;

    public $id;

    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('min:5')]
    public $streamLibraryId = '';

    #[Validate('min:5')]
    public $streamApiKey = '' ;

    #[Validate('min:5')]
    public $streamUserApiKey = '';


    public $logo = '';

    public function setSetting(Setting $setting)
    {

        $this->setting = $setting;
        $this->name = $setting->name;
        $this->streamLibraryId = $setting->streamLibraryId;
        $this->streamApiKey = $setting->streamApiKey;
        $this->streamUserApiKey = $setting->streamUserApiKey;
        $this->logo = $setting->logo;

    }




    public function update($id)
    {

        $this->validate();

        $this->setting->update(
            $this->only([
                'name', 'streamLibraryId', 'streamApiKey', 'streamUserApiKey', 'logo',
            ])
        );

        toastr()->success('Updated with successfully!');

        return redirect()->route('setting', $id);
    }
}
