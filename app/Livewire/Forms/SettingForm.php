<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Setting;
use Livewire\WithFileUploads;

class SettingForm extends Form
{
    use WithFileUploads;

    public ?Setting $setting;

    public $id;


    #[Validate('required|min:5')]
    public $name = '';

    #[Validate('nullable|min:5')]
    public $streamLibraryId = '';

    #[Validate('nullable|min:5')]
    public $streamApiKey = '' ;

    #[Validate('nullable|min:5')]
    public $streamUserApiKey = '';


    #[Validate('nullable|min:5')]
    public $moodleToken = '' ;

    #[Validate('nullable|min:5')]
    public $moodleUrl = '';


    public function setSetting(Setting $setting)
    {

        $this->setting = $setting;
        $this->name = $setting->name;
        $this->streamLibraryId = $setting->streamLibraryId;
        $this->streamApiKey = $setting->streamApiKey;
        $this->streamUserApiKey = $setting->streamUserApiKey;
        $this->moodleToken = $setting->moodleToken;
        $this->moodleUrl = $setting->moodleUrl;

    }

    public function update($id)
    {

        $this->validate();

            $this->setting->update(
               [
                    'name' => $this->name,
                    'streamLibraryId' => $this->streamLibraryId ,
                    'streamApiKey' => $this->streamApiKey,
                    'streamUserApiKey' => $this->streamUserApiKey,
                    'moodleToken' => $this->moodleToken,
                    'moodleUrl' => $this->moodleUrl,
                ]);

            toastr()->success('Updated with successfully!');

            return redirect()->route('setting.edit', $id);



    }
}
